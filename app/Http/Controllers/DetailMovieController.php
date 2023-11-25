<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class DetailMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $movie = Movie::with('cate')->where('slug_movie', $slug)->first();
        if ($movie) {
            $id_cate = $movie->id_cate;
            $id_movie = $movie->id_movie;
            $same = Movie::select('id_movie', 'img_movie', 'name_movie', 'slug_movie', 'id_cate')->with('cate')->where('id_movie', '<>', $id_movie)->where('id_cate', $id_cate)->get();

            return view('page.detailmovie', compact('movie', 'same'));
        } else {
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
