<?php

namespace App\Http\Controllers;

use App\EventQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Event;
use App\EventCheck;
use App\TempAddress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class WhiteMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $event = Event::orderBy('id', 'desc')->first();
        $user = Auth::user();
        $products = Product::where('deleted_at','=', null)->get();
        return view('whitemember-product', compact('products','user','event'));
    }


    public function profile()
    {
        $user = Auth::user();
        return view('whitemember-profile', compact('user'));
    }

    public function event()
    {
        $events = Event::where('deleted_at','=',null)->get();
        $user = Auth::user();
        foreach ($events as $key => $event){
            $queues[$key] = EventCheck::where('event_id','=',$event->id)->where('user_id','=',$user->id)->where('deleted_at','=',null)->first();
        }

        return view('whitemember-event', compact('events','queues'));
    }


    public function updateProfile(Request $request)
    {

        if($request->input('day') != null && $request->input('month') != null && $request->input('year') != null){

            $newDate = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
        }
        else{
            $newDate = null;
        }

        $user = Auth::user();
        $userAddress = $user->userAddress;
        $userCar = $user->userCar;

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->birthday = $newDate;
        $user->telephone = $request->input('telephone');
        $user->facebook = $request->input('facebook');
        $user->line_id_type = $request->input('line_id_type');
        $user->line_id = $request->input('line_id');
        $user->save();

        $userAddress->house_number = $request->input('house_number');
        $userAddress->village_number = $request->input('village_number');
        $userAddress->alley = $request->input('alley');
        $userAddress->road = $request->input('road');
        $userAddress->sub_district = $request->input('sub_district');
        $userAddress->district = $request->input('district');
        $userAddress->province = $request->input('province');
        $userAddress->country = $request->input('country');
        $userAddress->postal_code = $request->input('postal_code');
        $userAddress->save();

        $userCar->main_car_generation = $request->input('main_car_generation');
        $userCar->secondary_car_generation = $request->input('secondary_car_generation');
        $userCar->color = $request->input('color');
        $userCar->manufacture_year = $request->input('manufacture_year');
        $userCar->save();

        return redirect('/member/profile')->withErrors([
            'update-success' => ['แก้ไขข้อมูลสำเร็จ']
        ]);;

    }

    public function cartAdd(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        $request->session()->put('productAdd', $product);

        return redirect('/member/order/cart');
    }

    public function addOrder(Request $request)
    {
        $tempAddress = new TempAddress;
        $tempAddress->house_number = $request->input('house_number');
        $tempAddress->village_number = $request->input('village_number');
        $tempAddress->alley = $request->input('alley');
        $tempAddress->road = $request->input('road');
        $tempAddress->sub_district = $request->input('sub_district');
        $tempAddress->district = $request->input('district');
        $tempAddress->province = $request->input('province');
        $tempAddress->country = $request->input('country');
        $tempAddress->postal_code = $request->input('postal_code');
        $tempAddress->save();

        $latestRecord = TempAddress::orderBy('id', 'desc')->first();

        $order = new Order;
        $order->user_id = Auth::id();
        $order->product_id = $request->input('product_id');
        $order->number = $request->input('number');
        $order->note = $request->input('note');
        $order->status = 'WAITING_PAYMENT';
        $order->payment_date = null;
        $order->temp_address_id = $latestRecord->id;
        $order->save();

        return redirect('/member/order');
    }

    public function order()
    {
        $userID = Auth::id();
        $ordersWaiting = Order::where('user_id','=',$userID)->where('status','!=','SUCCESS')->where('deleted_at','=',null)->get();
        $ordersHistory = Order::where('user_id','=',$userID)->where('status','=','SUCCESS')->where('deleted_at','=',null)->get();

        return view('whitemember-order', compact('ordersWaiting','ordersHistory'));
    }

    public function deleteOrder($order_id)
    {
        $dateDay = Carbon::now()->toDateTimeString();
        $order = Order::find($order_id);
        $order->deleted_at = $dateDay;
        $order->save();
        return redirect('/member/order');
    }

    public function uploadPayment(Request $request)
    {


            Storage::putFileAs ('public/img/payment/'.$request->input('order_id'), $request->file('image'),$request->input('order_id').'.png');
            $order = Order::find($request->input('order_id'));
            $order->status = "WAITING_CONFIRM";
            $dateDay = Carbon::now()->toDateTimeString();
            $order->payment_date = $dateDay;
            $order->bank = $request->input('bank');
            $order->save();
            return redirect('/member/order');

    }

    public function orderSession(Request $request)
    {

        $order = Order::find($request->input('order_id'));
        $request->session()->put('orderDetail', $order);
        return redirect('/member/order/view');


    }

        public function changePassword()
    {

        return view('whitemember-change-password');


    }

    public function changePass(Request $request){

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);



        if (!(Hash::check($request->input('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->withErrors([
                'old_error' => ['กรุณาใส่รหัสผ่านเดิมให้ถูกค้อง']
            ]);

        }

        if(strcmp($request->input('old_password'), $request->input('password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->withErrors([
                'new_error' => ['กรุณาใส่รหัสผ่านใหม่ให้แตกต่างจากรหัสผ่านเดิม']
            ]);
        }

        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->back()->withErrors([
            'success' => ['เปลี่ยนรหัสผ่านสำเร็จ!']
        ]);


    }

}
