<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResetNotifycation;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    private $otp;
    public function __construct()
    {
        $this->otp=new Otp;
    }
    public function fogetpass(Request $request)
    {
       User::where('email',$request->email)->first()->notify(new ResetNotifycation());
       return response()->json([
        'status'=>true
       ]);
    }
    public function resetpass(Request $request)
    {
        $otp2=$this->otp->validate($request->email,$request->otp);
        if (!$otp2->status) {
           return response()->json([
            'error'=>$otp2
           ]);
        }
       $user=User::where('email',$request->email)->first();
       $user->update([
        'password'=>Hash::make($request->password)
       ]);
       $user->tokens()->delete();
       return response()->json([
        'status'=>true
       ]);
    }
}
