<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::all();

        return view('admin.catagory', compact('data'));
    }
    // create
    public function add_catagory(Request $request)
    {
        $massage = [
            'catagory.required' => 'Category name is required',
            'catagory.max' => 'The maximum number of characters is 50',
            'catagory.unique' => 'Please add a new Category'
        ];

        $validator = validator($request->all(), [
            'catagory' => 'required|max:50|unique:catagories,catagory_name'
        ],$massage);
        if ($validator->fails()) {
            // return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $data = new Catagory();
        $data->catagory_name = $request->catagory;
        $data->save();
        // return redirect()->back()->with('massage', 'Catagory Added Successfully');
    }
    // destroy
    public function delete_catagory($id)
    {
        $data = catagory::find($id);
        $data->delete();
        return redirect()->back()->with('massage', 'Catagory Deleted Successfully');
    }


    public function view_product()
    {
        $catagory = Catagory::all();
        return view('admin.add_product', compact('catagory'));
    }

    //create product
    public function add_product(Request $request)
    {

        request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'catagory' => ['required'],
            'image' => ['required'],
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->catagory = $request->catagory;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();
        return redirect()->back()->with('massage', 'Product Added Successfully');
    }
    //read product
    public function show_product()
    {
        $products = Product::all();
        return view('admin.show_product', compact('products'));
    }

    //update product
    public function update_product($id)
    {
        $product = Product::find($id);
        $catagory = Catagory::all();
        return view('admin.update_product', compact('product', 'catagory'));
    }



    //delete product
    public function delete_product($id)
    {
        $product = Product::find($id);

        $path = public_path('product/' . $product->image);
        if (file_exists($path)) {
            unlink($path);
        }

        $product->delete();

        return redirect()->back()->with('massage', 'Product Deleted Successfully');
    }

    public function update_product_confirm(Request $request, $id)
    {

        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->catagory = $request->catagory;

        $image = $request->image;
        if ($image) {
            $path = public_path('product/' . $product->image);
            if (file_exists($path)) {
                unlink($path);
            }
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }
        $product->save();
        return redirect()->back()->with('massage', 'Product Updated Successfully');
    }



    public function all_orders()
    {
        $order = Order::all();
        $catagory = Catagory::all();

        return view('admin.order', compact('order', 'catagory'));
    }

    public function deliverd($id)
    {
        $order = Order::find($id);
        $order->payment_status = 'paid';
        $order->delivery_status = 'deliverd';
        $order->save();

        return redirect()->back();
    }


    public function search(Request $request)
    {
        $catagory = Catagory::all();
        $search = $request->search;
        $order = order::where('name', 'LIKE', "%$search%")->get();
        return view('admin.order', compact('order', 'catagory'));
    }
    public function catbtn($id)
    {
        $catagory = Catagory::all();
        $order = order::where('catagory', 'LIKE', "%$id%")->get();
        return view('admin.order', compact('order', 'catagory'));
    }
}
