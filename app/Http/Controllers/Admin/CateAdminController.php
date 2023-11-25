<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CateAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate = Cate::latest('id_cate')->get();

        return view('admin.cate.index', compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cate = $request->all();
        $cate['slug_cate'] = Str::slug($cate['name_cate']);
        Cate::create($cate);

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
        $cate = Cate::find($id);

        return view('admin.cate.edit', compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cate = Cate::find($id);
        $data = $request->all();
        $data['slug_cate'] = Str::slug($data['name_cate']);
        $cate->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cate::find($id)->delete();

        return back();
    }
}
