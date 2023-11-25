<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class CateDeleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cate = Cate::onlyTrashed()->get();

        return view('admin.cate.delete', compact('cate'));
    }

    public function restore(string $id)
    {
        Cate::withTrashed()->where('id_cate', $id)->restore();

        return back();
    }

    public function delete_at(string $id)
    {
        Cate::withTrashed()->where('id_cate', $id)->forceDelete();

        return back();
    }

    public function restore_all()
    {
        Cate::withTrashed()->restore();

        return back();
    }

    public function delete_all()
    {
        Cate::onlyTrashed()->forceDelete();

        return back();
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
    public function show(string $id)
    {
        //
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
