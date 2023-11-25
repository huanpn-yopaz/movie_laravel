<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @param  View  $view
     */
    public function index(Request $request)
    {
        $ip = $request->ip();
        $count_visitor = Visitor::where('ip_visitor', $ip)->get()->count('id_visitor');
        if ($count_visitor < 1) {
            $visitor = new Visitor();
            $visitor->ip_visitor = $ip;
            $visitor->date_visitor = Carbon::now();
            $visitor->save();
        }
        $free = Movie::inRandomOrder()->select('id_movie', 'img_movie', 'name_movie', 'slug_movie', 'id_cate')->with('cate')->where('status_movie', 0)->get();
        $vip = Movie::inRandomOrder()->select('id_movie', 'img_movie', 'name_movie', 'slug_movie', 'id_cate')->with('cate')->where('status_movie', 1)->get();

        return view('page.home', compact('free', 'vip'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        $data = $request->all();
        if ($data['query']) {
            $movie_search = Movie::select('img_movie', 'name_movie', 'slug_movie')->where('name_movie', 'LIKE', '%'.$data['query'].'%')->get();
            if ($movie_search->count() > 0) {
                $output = '';
                foreach ($movie_search as $key => $value) {
                    $output .= '<a href="'.Route('chi-tiet-phim.show', [$value->slug_movie]).'">
                    <div style="margin: 2rem 0;">
                       <div style="display: flex;align-items: center;">
                          <div style="width: 25px;height: 25px;"><img style="border-radius: 50%;"
                                src="'.asset('img/'.$value->img_movie).'" alt="'.$value->slug_movie.'"></div>
                          <div style="margin-left: 1rem;"><span>'.$value->name_movie.'</span></div>
                       </div>
                    </div>
                   </a> ';
                }
                echo $output;
            } else {
                $output = '<p style="text-align:center;margin-top:4px">Không tìm thấy kết quả</p>';
                echo $output;
            }
        }
    }

    /**
     * Display the specified resource.
     */

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
    public function tag(Request $request, string $tags)
    {
        $name_tag = $tags;
        $resuft = Movie::Orwhere('tags_movie', 'LIKE', '%'.$tags.'%')->Orwhere('slug_movie', 'LIKE', '%'.$tags.'%')->Orwhere('name_movie', 'LIKE', '%'.$tags.'%')->Orwhere('desc_movie', 'LIKE', '%'.$tags.'%')->get();

        return view('page.tags', compact('resuft', 'name_tag'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function vnpay(Request $request)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
        $vnp_Returnurl = 'http://localhost/movie/';
        $vnp_TmnCode = '79SOVCX8'; //Mã website tại VNPAY
        $vnp_HashSecret = 'RHMPQNHZFLMSBIDJZXRDGTWHFVBBFEOG'; //Chuỗi bí mật
        $rand = rand(00, 99999);
        $vnp_TxnRef = $rand; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'thanh toan test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 30000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = [
            'vnp_Version' => '2.1.0',
            'vnp_TmnCode' => $vnp_TmnCode,
            'vnp_Amount' => $vnp_Amount,
            'vnp_Command' => 'pay',
            'vnp_CreateDate' => date('YmdHis'),
            'vnp_CurrCode' => 'VND',
            'vnp_IpAddr' => $vnp_IpAddr,
            'vnp_Locale' => $vnp_Locale,
            'vnp_OrderInfo' => $vnp_OrderInfo,
            'vnp_OrderType' => $vnp_OrderType,
            'vnp_ReturnUrl' => $vnp_Returnurl,
            'vnp_TxnRef' => $vnp_TxnRef,
        ];

        if (isset($vnp_BankCode) && $vnp_BankCode != '') {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != '') {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = '';
        $i = 0;
        $hashdata = '';
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&'.urlencode($key).'='.urlencode($value);
            } else {
                $hashdata .= urlencode($key).'='.urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key).'='.urlencode($value).'&';

        }

        $vnp_Url = $vnp_Url.'?'.$query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash='.$vnpSecureHash;

        }
        if (Auth::check() && Auth::user()->role == '0') {
            $user = User::find(Auth::user()->id);
            $user->role = '2';
            $user->save();
        }
        $returnData = ['code' => '00', 'message' => 'success', 'data' => $vnp_Url];

        if ($vnp_Url) {
            header('Location: '.$vnp_Url);
            exit();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
}
