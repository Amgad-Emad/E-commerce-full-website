<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Catagory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $total_orders = Order::all()->count();
            $total_products = Product::all()->count();
            $total_users = User::all()->count();
            $total_revenue = Order::sum('price');
            $total_delivered = Order::where('delivery_status', '=', 'deliverd')->get()->count();
            $total_processed = Order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact(
                'total_orders',
                'total_products',
                'total_users',
                'total_delivered',
                'total_processed',
                'total_revenue'
            ));
        } else {
            $products = Product::paginate(3);
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }



    public function add_cart(Request $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            $cart->catagory = $product->catagory;

            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return to_route('login');
        }
    }
    public function show_cart()
    {
        if (Auth::check()) {
            $id = Auth::id();
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('cart'));
        } else {
            return to_route('login');
        }
    }
    public function remove_from_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $userid = Auth::id();
        $data = Cart::where('user_id', '=', $userid)->get();
        foreach ($data as $d) {
            $order = new Order;
            $order->name = $d->name;
            $order->email = $d->email;
            $order->phone = $d->phone;
            $order->address = $d->address;
            $order->user_id = $d->user_id;
            $order->product_title = $d->product_title;
            $order->price = $d->price;
            $order->quantity = $d->quantity;
            $order->image = $d->image;
            $order->product_id = $d->product_id;
            $order->catagory = $d->catagory;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();
            $cart_id = $d->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('massage', 'the order has been submited we will contact with you soon...');
    }


    public function all_products()
    {
        $catagory = Catagory::all();

        $products = Product::paginate(10);
        return view('home.all_products', compact('products','catagory'));
    }


    public function My_orders() {
        if (Auth::check()) {
            $id = Auth::id();
            $order = Order::where('user_id', '=', $id)->get();
            return view('home.my_order', compact('order'));
        } else {
            return to_route('login');
        }
        
    }
    public function cancel_order($id) {
        $order=Order::find($id);
        $order->delete();

        return redirect()->back();
        
    }

    public function search(Request $request)
    {
        $catagory = Catagory::all();
        $search = $request->search;
        $products = Product::where('title', 'LIKE', "%$search%")->paginate(10);
        return view('home.all_products', compact('products', 'catagory'));
    }
    public function catbtn($id)
    {
        $catagory = Catagory::all();
        $products = Product::where('catagory', 'LIKE', "%$id%")->paginate(10);
        return view('home.all_products', compact('products', 'catagory'));
    }
}
