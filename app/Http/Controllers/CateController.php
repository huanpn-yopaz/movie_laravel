<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class CateController extends Controller
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
        $slug=Cate::where('slug_cate',$slug)->first();
        if ($slug) {
            $name_cate=$slug->name_cate;
            $id_cate=$slug->id_cate;
            $same=Movie::select('id_movie','img_movie','name_movie','slug_movie','id_cate')->with('cate')->where('id_cate',$id_cate)->get();
            return view('page.cate',compact('same','name_cate'));
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
