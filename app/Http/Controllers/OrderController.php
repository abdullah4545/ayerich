<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Orderproduct;
use App\Models\Comment;
use App\Models\Product;
use DB;
use App\Models\Admin;
use Cart;
use Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function pressorder(Request $request){

        $shopproducts = Cart::content()->groupBy('shop_id');

        if(!Session::has('cart')){
            return redirect('/empty-cart');
        }elseif(Cart::count() == 0){
            return redirect('/empty-cart');
        }else{

            foreach($shopproducts as $shopproduct){
                $admin = Admin::whereHas('roles', function($q) { $q->where('name', 'user'); })->where('add_by',$shopproduct[0]->shop_id)->where('status','Active')->inRandomOrder()->first();

                $order= new Order();
                $order->user_id = $request->user_id;
                $order->store_id = $shopproduct[0]->shop_id;
                $order->invoiceID = $this->uniqueID();
                $order->subTotal = $shopproduct->sum('price');
                $order->deliveryCharge = $request->deliveryCharge;
                $order->orderDate = date('Y-m-d');
                $order->customerNote = $request->customerNote;
                if(isset($admin)){
                    $order->admin_id = $admin->id;
                }else{
                    $admin = Admin::where('id',$shopproduct[0]->shop_id)->first();
                    $order->admin_id = $shopproduct[0]->shop_id;
                }

                $result = $order->save();
                if ($result) {
                    $customer = new Customer();
                    $customer->order_id = $order->id;
                    $customer->customerName = $request->name;
                    $customer->customerPhone = $request->phone;
                    $customer->customerAddress = $request->address;
                    $customer->save();
                    foreach ($shopproduct as $product) {
                        $orderProducts = new Orderproduct();
                        $orderProducts->order_id = $order->id;
                        $orderProducts->product_id = $product->id;
                        $orderProducts->productCode = $product->code;
                        $orderProducts->productName = $product->name;
                        $orderProducts->quantity = $product->qty;
                        $orderProducts->productPrice = $product->price;
                        $orderProducts->shop_id = $product->shop_id;
                        $orderProducts->save();
                        $ordernew= Order::where('id',$order->id)->first();
                        $ordernew->point = $ordernew->point+Product::where('id',$product->id)->first()->bonus_point;
                        $ordernew->update();
                    }

                    $notification = new Comment();
                    $notification->order_id = $order->id;
                    $notification->comment =  $order->invoiceID . ' Order Has Been Created for ' . $admin->name;
                    $notification->admin_id = $order->admin_id;
                    $notification->save();

                } else {
                    Customer::where('order_id', '=', $order->id)->delete();
                    Orderproduct::where('order_id', '=', $order->id)->delete();
                    Comment::where('order_id', '=', $order->id)->delete();
                    Order::where('id', '=', $order->id)->delete();
                    $response['status'] = 'failed';
                    $response['message'] = 'Unsuccessful to press order';
                }
            }

            Cart::destroy();
            Session::put('ordersubtotal', $request->subTotal);
            Session::put('orderdeliverycharge', $request->deliveryCharge);
            Session::put('order_id', $order->id);
            toastr()->info('Order Press Successfully', 'Complete', ["positionClass" => "toast-top-center"]);
            return redirect('payment/methood');
        }

    }

    public function uniqueID()
    {
        $lastOrder = Order::latest('id')->first();
        if ($lastOrder) {
            $orderID = $lastOrder->id + 1;
        } else {
            $orderID = 1;
        }

        return 'DS' . $orderID;
    }

    public function updatepaymentmethood(Request $request)
    {
        $order=Order::where('id',$request->order_id)->first();
        $order->Payment=$request->payment_option;
        $order->update();
        Session::put('successfulor','successfulor');
        return redirect('order/complete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}