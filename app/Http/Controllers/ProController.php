<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Pro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Validator;
use Illuminate\Support\Str;
class ProController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pro.index');
    }
    public function fetch_pro()
    {
        $pro = Pro::latest()->get();
        return response()->json([
            "data"=>$pro
        ]);
        // $output='';
        // foreach ($pro as $key => $value) {
        //     $output .= ' 
        //     <tr>
        //     <td>'.$value->name_pro.'</td>
        //     <td><img src="'.asset('storage/images/' . $value->img_pro).'" alt="" width="30"></td>
        //     <td><button id="show" type="button" class="btn btn-primary"
        //             data-id="'.$value->id_pro.'" data-toggle="modal" data-target="#model_update">
        //             update
        //         </button></td>

        //     <td>

        //         <button id="delete_pro" data-id="'.$value->id_pro.'" type="button">
        //             <p class="text-error">Delete</p>
        //         </button>

        //     </td>


        // </tr>';
        // }
        // echo $output;
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
    public function store(TestRequest $request)
    {
        $data = $request->all();
        $data['slug']=Str::slug($request->name_pro);
        if ($save_img_pro = $request->file('img_pro')) {
            $destinationPath = 'public/images';
            $img_pro = date('YmdHis').'.'.$save_img_pro->getClientOriginalExtension();
            $save_img_pro->storeAs($destinationPath, $img_pro);
            $data['img_pro'] = $img_pro;
        }

        Pro::create($data);
       
            return response()->json([
                'status' => 200,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show_pro(Request $request)
    {
        $id = $request->id;
        $pro = Pro::find($id);

        return response()->json($pro);
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
    public function update_pro(Request $request)
    {
        // $fileName = '';
        // $emp = Pro::find($request->id_pro);
        // if ($request->hasFile('img_pro')) {
        //     $file = $request->file('img_pro');
        //     $fileName = time() . '.' . $file->getClientOriginalExtension();
        //     $file->storeAs('public/images', $fileName);
        //     if ($emp->img_pro) {
        //         Storage::delete('public/images/' . $emp->img_pro);
        //     }
        // } else {
        //     $fileName = $request->img_pro;
        // }

        // $empData = ['name_pro' => $request->name_pro, 'img_pro' => $fileName];

        // $emp->update($empData);
        // return response()->json([
        //     'status' => 200,
        // ]);
        $pro = Pro::find($request->id_pro);
        $data = $request->all();
        $data['slug']=Str::slug($request->name_pro);
        if ($save_img_pro = $request->file('img_pro')) {
            $destinationPath = 'public/images';
            $img_pro = date('YmdHis').'.'.$save_img_pro->getClientOriginalExtension();
            $save_img_pro->storeAs($destinationPath, $img_pro);
            $data['img_pro'] = $img_pro;
            Storage::delete('public/images/'.$pro->img_pro);
        }
        $pro->update($data);

        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_pro(Request $request)
    {
        $id = $request->id;
        $pro = Pro::find($id);
        if (isset($pro->img_pro)) {
            Storage::delete('public/images/'.$pro->img_pro);
        }
        $pro->delete();

        return response()->json([
            'status' => 200,
        ]);
    }
}
