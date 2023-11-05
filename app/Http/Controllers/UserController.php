<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
       $user=User::find($id);
       return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:35',
            'email' => 'required|email|unique:users,email,'.$id,
           
        ], [
            'name.required' => 'Không được bỏ trống',
            'name.max' => 'Nhỏ hơn 35 kí tự',
            'email.required' => 'Không được bỏ trống',
            'email.unique' => 'Email đã được sử dụng',
            'email.email' => 'Sai định dạng Email'
        ]);
        $user=User::find($id);
        $user->update($request->all());
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        $user->delete();
        return back();
    }
}
