<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\User;
use App\TempAddress;
use App\ExceptCode;
use App\CurrentCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dateDay = Carbon::now()->toDateString();
        $ordersNew = Order::where('created_at','like', '%'.$dateDay.'%')->where('deleted_at','=', null)->get();
        $orders = Order::where('deleted_at','=', null)->orderBy('created_at', 'desc')->get();
        $ordersMonth = Order::where('created_at','like', '%'.Carbon::now()->format('Y-m').'%')->where('deleted_at','=', null)->get();
        $ordersMonthConfirm = Order::where('created_at','like', '%'.Carbon::now()->format('Y-m').'%')->where('status','=', 'CONFIRM')->where('deleted_at','=', null)->get();
        $ordersTodayConfirm = Order::where('created_at','like', '%'.$dateDay.'%')->where('status','=', 'CONFIRM')->where('deleted_at','=', null)->get();
        $todaySell = 0.00;
        $monthSell = 0.00;

        foreach ($ordersMonthConfirm as $orderMonthConfirm){
            $monthSell += ($orderMonthConfirm->product->member_price * $orderMonthConfirm->number) + $orderMonthConfirm->product->delivery_price;
        }
        foreach ($ordersTodayConfirm as $orderTodayConfirm){
            $todaySell += ($orderTodayConfirm->product->member_price * $ordersTodayConfirm->number) + + $ordersTodayConfirm->product->delivery_price;
        }
        return view('admin-dashboard',compact('ordersNew','orders', 'todaySell', 'ordersMonth', 'monthSell'));
    }

    public function memberUserSession(Request $request)
    {
        $user = User::where('id','=',$request->input('user_id'))->first();
        $request->session()->put('dashboardUserDetail', $user);
        return redirect('/admin/member/user-view');
    }

    public function member(){
        $users = User::where('deleted_at','=',null)->orderBy('code','asc')->get();
        return view('admin-member-view',compact('users'));
    }

    public function memberChangeCode(Request $request){
        $users = User::all();
        $codeDuplicate = false;
        foreach ($users as $user){

            if($user->code == $request->input('code')){
                $codeDuplicate = true;
                break;
            }

        }
        if($codeDuplicate == true){
            return redirect()->back()->withErrors([
                'code-duplicate' => ['ผิดพลาด! หมายเลขสมาชิกนี้มีอยู่ในระบบแล้ว']
            ]);
        }
        else{
            $user = User::where('id','=',$request->input('user_id'))->first();
            $user->code = $request->input('code');
            $user->save();
            $CurrentCode =  CurrentCode::orderBy('id', 'desc')->first();
            $CurrentCode->current_code = 1;
            $CurrentCode->save();
            return redirect()->back()->withErrors([
                'change-success' => ['เปลี่ยนหมายเลขสมาชิกสำเร็จ']
            ]);
        }
    }

    public function addOrder()
    {

        return view('admin-find-user');
    }

    public function findUser(Request $request)
    {
        $products = Product::all();
        $request->session()->put('productDetail', $products);
        //$request->session()->forget('userDetail');
        $user = User::where('code','=', $request->input('code'))->first();

        if(empty($user)){
            return redirect()->back()->withErrors([
                'wrong-code' => ['ไม่มีหมายเลขสมาชิกนี้ในระบบ']
            ]);
        }
        else{

            return redirect('/admin/add-order/'.$user->code);
        }


    }

    public function addProductFunction(Request $request)
    {

        $user = User::where('code','=', $request->input('user_code'))->first();

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
        $order->user_id = $user->id;
        $order->product_id = $request->input('product');
        $order->number = $request->input('number');
        $order->note = $request->input('note');
        $order->status = 'WAITING_PAYMENT';
        $order->payment_date = null;
        $order->temp_address_id = $latestRecord->id;
        $order->save();

        return redirect()->back()->withErrors([
            'success' => ['เพิ่มรายการสั่งซื้อสำเร็จ!']
        ]);

    }

    public function confirmOrder()
    {
        //$dateDay = Carbon::now()->toDateString();

        $orders = Order::where('deleted_at','=', null)->where('status','=', 'WAITING_CONFIRM')->where('product_id','!=', 3)->orderBy('created_at', 'desc')->get();
        $ordersWaitDelivery = Order::where('deleted_at','=', null)->where('status','=', 'CONFIRM')->where('product_id','!=', 3)->orderBy('created_at', 'desc')->get();
        $lotStickers = Order::where('deleted_at','=', null)->where('status','=', 'CONFIRM')->where('product_id','=', 3)->orderBy('created_at', 'desc')->get();
        $manufactureStickers = Order::where('deleted_at','=', null)->where('status','=', 'WAITING_PRODUCTION')->where('product_id','=', 3)->orderBy('created_at', 'desc')->get();

        return view('admin-confirm-order',compact('orders','lotStickers','manufactureStickers', 'ordersWaitDelivery'));
    }

    public function confirmSticker()
    {
        //$dateDay = Carbon::now()->toDateString();

        $orders = Order::where('deleted_at','=', null)->where('status','=', 'WAITING_CONFIRM')->where('product_id','=', 3)->orderBy('created_at', 'desc')->get();
        $lotStickers = Order::where('deleted_at','=', null)->where('status','=', 'CONFIRM')->where('product_id','=', 3)->orderBy('created_at', 'desc')->get();
        $manufactureStickers = Order::where('deleted_at','=', null)->where('status','=', 'WAITING_PRODUCTION')->where('product_id','=', 3)->orderBy('created_at', 'desc')->get();

        return view('admin-confirm-sticker',compact('orders','lotStickers','manufactureStickers'));
    }

    public function manufactureStickerShop()
    {
        //$dateDay = Carbon::now()->toDateString();
        $ordersWaitDelivery = Order::where('deleted_at','=', null)->where('status','=', 'FINISHED_PRODUCTION')->where('product_id','=', 3)->orderBy('created_at', 'desc')->get();
        $manufactureStickers = Order::where('deleted_at','=', null)->where('status','=', 'WAITING_PRODUCTION')->where('product_id','=', 3)->orderBy('created_at', 'desc')->get();
        $finishedStickers = Order::where('deleted_at','=', null)->where('status','=', 'FINISHED_PRODUCTION')->where('product_id','=', 3)->orderBy('created_at', 'desc')->get();
        return view('admin-sticker-shop',compact('manufactureStickers', 'ordersWaitDelivery', 'finishedStickers'));
    }

    public function deliverySticker($order_id)
    {
        $order = Order::find($order_id);
        $order->status = "SUCCESS";
        $order->save();
        return redirect('/admin/manufacture-sticker');
    }

    public function deliveryOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->status = "SUCCESS";
        $order->save();
        return redirect('/admin/confirm-order');
    }

    public function addProduct()
    {
        $products = Product::where('deleted_at','=', null)->get();
        return view('admin-add-product',compact('products'));
    }

    public function exceptNumber()
    {
        $exceptCodes = ExceptCode::all();
        return view('admin-except-number',compact('exceptCodes'));
    }

    public function dashboardOrderSession(Request $request)
    {

        $order = Order::find($request->input('order_id'));
        $request->session()->put('orderDetail', $order);
        return redirect('/admin/dashboard/order-view');
    }

    public function confirmOrderOrderSession(Request $request)
    {

        $order = Order::find($request->input('order_id'));
        $request->session()->put('orderDetail', $order);
        return redirect('/admin/confirm-order/order-view');
    }

    public function confirmStickerOrderSession(Request $request)
    {

        $order = Order::find($request->input('order_id'));
        $request->session()->put('orderDetail', $order);
        return redirect('/admin/confirm-sticker/order-view');
    }

    public function dashboardDeleteOrder($order_id)
    {
        $dateDay = Carbon::now()->toDateTimeString();
        $order = Order::find($order_id);
        $order->deleted_at = $dateDay;
        $order->save();
        return redirect('/admin/dashboard');
    }

    public function confirmOrderDeleteOrder($order_id)
    {
        $dateDay = Carbon::now()->toDateTimeString();
        $order = Order::find($order_id);
        $order->deleted_at = $dateDay;
        $order->save();
        return redirect('/admin/confirm-order');
    }

    public function dashboardConfirmPayment($order_id)
    {
        $order = Order::find($order_id);
        $order->status = "CONFIRM";
        $order->save();
        return redirect('/admin/dashboard');
    }

    public function confirmOrderConfirmPayment($order_id)
    {
        $order = Order::find($order_id);
        $order->status = "CONFIRM";
        $order->save();
        return redirect('/admin/confirm-order');
    }

    public function confirmStickerConfirmPayment($order_id)
    {
        $order = Order::find($order_id);
        $order->status = "CONFIRM";
        $order->save();
        return redirect('/admin/confirm-sticker');
    }

    public function uploadPayment(Request $request)
    {

        Storage::delete('public/img/payment/'.$request->input('order_id').'/'.$request->input('order_id').'.png');
        Storage::putFileAs ('public/img/payment/'.$request->input('order_id'), $request->file('image'),$request->input('order_id').'.png');
        $order = Order::find($request->input('order_id'));
        $order->status = "WAITING_CONFIRM";
        $dateDay = Carbon::now()->toDateTimeString();
        $order->payment_date = $dateDay;
        $order->bank = $request->input('bank');
        $order->save();
        return redirect('/admin/dashboard');

    }

    public function addProductAdd(Request $request)
    {

        $product = new Product;
        $product->name = $request->input('name');
        $product->member_price = $request->input('member_price');
        $product->normal_price = $request->input('normal_price');
        $product->delivery_price = $request->input('delivery_price');
        $product->description = $request->input('description');
        $product->save();
        $latestRecord = Product::orderBy('id', 'desc')->first();


        Storage::putFileAs ('public/img/product/'.$latestRecord->id, $request->file('image'),$latestRecord->id.'.png');
        return redirect('/admin/add-product');

    }


    public function exceptNumberAdd(Request $request)
    {
        $exceptCode = new ExceptCode;
        $exceptCode->except_code = $request->input('code');
        $exceptCode->save();
        return redirect('/admin/except-number');
    }

    public function lotSticker(Request $request)
    {
        $stickersID = $request->input('id_orders');
        foreach ($stickersID as $stickerID) {
            $order = Order::find($stickerID);
            $order->status = 'WAITING_PRODUCTION';
            $order->save();
        }
        return redirect('/admin/confirm-sticker');
    }

    public function finishedProduction(Request $request)
    {
        $stickersID = $request->input('id_orders');
        foreach ($stickersID as $stickerID) {
            $order = Order::find($stickerID);
            $order->status = 'FINISHED_PRODUCTION';
            $order->save();
        }
        return redirect('/admin/manufacture-sticker');
    }

    public function  manufactureSticker(Request $request){

        $stickersID = $request->input('id_orders');
        foreach ($stickersID as $stickerID) {
            $order = Order::find($stickerID);
            $order->status = 'FINISHED_PRODUCTION';
            $order->save();
        }
        return redirect('/admin/confirm-order');

    }
}
