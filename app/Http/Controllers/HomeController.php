<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Stripe\Checkout\Session;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }else{
            $count= '';
        }
        $status = User::where('usertype','user')->get()->count();
        $user = Order::where('status','in progress')->get()->count();
        $product = Products::all()->count();
        $order = Order::all()->count();
        return view('admin.index',compact('count','user','product','order','status'));
    }

    public function login_home()
    {
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }else{
            $count= '';
        }
        return view('home.index',compact('count'));
    }
    public function home()
    {
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }else{
            $count= '';
        }

        return view('home.index',compact('count'));
    }

    public function shop()
    {
        $product = Products::all();
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }else{
            $count= '';
        }
        return view('home.shop.shop',compact('product','count'));
    }

    public function product($id)
    {
        $data = Products::find($id);
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }else{
            $count= '';
        }
        return view('home.shop.product',compact('data','count'));
    }

    public function contact()
    {
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid);
        }else{
            $count= '';
        }
        return view('home.contact',compact('count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        toastr()->success('Product Add To Cart Successfully');
        return redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
        }else{
            $count= '';
        }
        return view('home.shop.mycart',compact('count','cart'));
    }

    public function shiping_order()
    {
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
        }else{
            $count= '';
        }
        return view('home.shop.shiping_order',compact('cart','count'));
    }

    public function cart_remove($id)
    {
        $data = Cart::find($id);
        $data->delete();
        toastr()->deleted();
        return redirect()->back();
    }

    public function shipping(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();
        foreach ($cart as $carts){
            $order = new Order();

            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();

            $cart_remove = Cart::where('user_id',$userid)->get();
            foreach ($cart_remove as $remove){
                $data = Cart::find($remove->id);
                $data->delete();
            }
            toastr()->success('Your Order Recived successfully');
            return redirect('/');
        }
    }

    public function my_orders()
    {
        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->get()->count();
        $order = Order::where('user_id', $user)->get();
        return view('home.shop.my_orders',compact('count','order'));
    }
    public function stripe($value)
    {
        return view('home.shop.stripe',compact('value'));
    }
    public function stripepost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $value * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from youshop.com."
        ]);

        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();
        foreach ($cart as $carts){
            $order = new Order();

            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->payment_status = 'Paid';
            $order->save();

            $cart_remove = Cart::where('user_id',$userid)->get();
            foreach ($cart_remove as $remove){
                $data = Cart::find($remove->id);
                $data->delete();
            }
            toastr()->success('Your Order Recived successfully');
            return redirect('/');
        }
    }

    public function blog()
    {
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid);
        }else{
            $count= '';
        }
        return view('home.blog',compact('count'));
    }

    public function search(Request $request)
    {

        $search = $request->search;
        $products = Products::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(5);
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid);
        }else{
            $count= '';
        }
        return view('home.index',compact('products','count'));
    }

}
