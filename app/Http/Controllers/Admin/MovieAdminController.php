<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie = Movie::latest()->get();

        return view('admin.movie.index', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate = Cate::get();
        $genre = Genre::get();

        return view('admin.movie.create', compact('cate', 'genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = $request->all();
        foreach ($movie['genre'] as $value) {
            $movie['id_genre'] = $value[0];
        }
        $movie['slug_movie'] = Str::slug($movie['name_movie']);
        if ($save_img_movie = $request->file('img_movie')) {
            $destinationPath = 'public/img';
            $img_movie = date('YmdHis').'.'.$save_img_movie->getClientOriginalExtension();
            $save_img_movie->move($destinationPath, $img_movie);
            $movie['img_movie'] = $img_movie;
        }

        $id_movie = Movie::create($movie);
        $id_movie->movie_genre()->attach($movie['genre']);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        $cate = Cate::get();
        $genre = Genre::get();
        $movie_genre = $movie->movie_genre;

        return view('admin.movie.edit', compact('movie', 'cate', 'genre', 'movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        $data = $request->all();
        $data['slug_movie'] = Str::slug($data['name_movie']);
        if ($save_img_movie = $request->file('img_movie')) {
            $destinationPath = 'public/img';
            $img_movie = date('YmdHis').'.'.$save_img_movie->getClientOriginalExtension();
            $save_img_movie->move($destinationPath, $img_movie);
            $data['img_movie'] = $img_movie;
            unlink('public/img/'.$movie->img_movie);
        }
        foreach ($data['genre'] as $value) {
            $movie->id_genre = $value[0];
        }
        $movie->update($data);
        $movie->movie_genre()->sync($data['genre']);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        if (isset($movie->img_movie)) {
            unlink('public/img/'.$movie->img_movie);
        }
        Movie_Genre::whereIn('id_movie', [$movie->id_movie])->delete();
        $movie->delete();

        return back();
    }
}
