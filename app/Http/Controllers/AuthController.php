<?php

namespace App\Http\Controllers;

use App\Jobs\MailerJob;
use App\Mail\Mailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('page.login');
    }

    public function register()
    {
        return view('page.register');
    }

    public function check_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'password.required' => 'Không được bỏ trống',
            'password.min' => 'Lớn hơn 8 kí tự',
            'email.required' => 'Không được bỏ trống',
            'email.email' => 'Sai định dạng Email',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if (Auth::check() && Auth::user()->role == '1') {
                return redirect('dashboard');
            } elseif (Auth::check()) {
                if ($user instanceof \App\Models\User) {
                    $token = $user->createToken('user')->plainTextToken;
                    $cookie = cookie('user', $token, 10080);

                    return redirect('/')->withCookie($cookie);
                }
            }
        } else {

            return back()->with('fail', 'Sai email hoặc mật khẩu');
        }
    }

    public function check_register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:35',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ], [
            'name.required' => 'Không được bỏ trống',
            'name.max' => 'Nhỏ hơn 35 kí tự',
            'password.required' => 'Không được bỏ trống',
            'password.min' => 'Lớn hơn 8 kí tự',
            'password.regex' => 'Phải có chữ hoa, chữ thường và số',
            'email.required' => 'Không được bỏ trống',
            'email.unique' => 'Email đã được sử dụng',
            'email.email' => 'Sai định dạng Email',
        ]);
        $user = $request->all();
        $email = User::create($user)->email;
        if (isset($email)) {
            // $data = [
            //     'email' => $email,
            // ];
            // dispatch(new MailerJob($data));
            //  Mail::to($email)->send(new Mailer($email));
            // $data=[
            //     'email'=>$email,
            // ];
            // Mail::to($email)->send(new Mailer($data));
            $data = [
                'email' => $email,
            ];
                Mail::send('mailer.mail', $data, function ($mesage) use ($data) {
                    $mesage->to($data['email']);
                    $mesage->subject('Coupon Code');
                });
            
        }

        return redirect('dang-nhap');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logout()
    {
        if (Cookie::has('user')) {
            /** @var \App\Models\User $user * */
            $user = Auth::user();
            $user->tokens()->delete();
            Cookie::queue(Cookie::forget('user'));
        }
        Auth::logout();

        return redirect('/');
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
