<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
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
        $slug=Genre::where('slug_genre',$slug)->first();
        if ($slug) {
            $id_genre=$slug->id_genre;
        $name_genre=$slug->name_genre;
        $movie_genre=Movie_Genre::where('id_genre',$id_genre)->get();
        $many_genre=[];
        foreach ($movie_genre as $value) {
            $many_genre[]=$value->id_movie;
        }
        $movie=Movie::inRandomOrder()->select('id_movie','img_movie','name_movie','slug_movie','id_cate')->with('movie_genre')->whereIn('id_movie',$many_genre)->get();
        return view('page.genre',compact('movie','name_genre'));
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
