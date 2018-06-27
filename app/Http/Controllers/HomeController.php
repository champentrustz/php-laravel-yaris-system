<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\User;
use App\TempAddress;
use App\ExceptCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'WHITE MEMBER'){;

            return redirect('/member/product');
        }

        if($user->role == 'ADMIN'){;
            return redirect('/admin/dashboard');
        }

        else{
            Auth::logout();
            return redirect('/login')->withErrors([
                'email' => ['ผิดพลาด! กรุณาตรวจสอบอีเมล์หรือรหัสผ่านอีกครั้ง']
            ]);
        }

    }

    public function searchMember(Request $request){

        $user = User::where('first_name','like', '%'.$request->input('first_name').'%')->where('last_name','like', '%'.$request->input('last_name').'%')->first();
            return view('search-member-view',compact('user'));


    }

    public function changePassword(Request $request){

//        $status = $request->validate([
//            'password' => 'required|string|min:6|confirmed',
//        ]);


        $user = User::where('code','=', $request->input('code'))->first();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('/login')->withErrors([
            'change-pass-success' => ['เปลี่ยนรหัสผ่านสำเร็จ!']
        ]);
    }

    public function announce(){

        $users = User::where('deleted_at','=',null)->orderBy('code','asc')->get();
        return view('announce',compact('users'));
    }



    public function announcePrint(){

        $users = User::where('deleted_at','=',null)->orderBy('code','asc')->get();
        return view('announce-print',compact('users'));
    }

}
