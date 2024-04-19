<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data['type_menu'] = 'product';
        $data['products'] = Product::all();

        return view('pages.product.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $product_img = time().'.'.$request->image->extension();
        $request->image->move(public_path('product'), $product_img);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $product_img,
            'stock' => 0
        ]);

        return redirect()->back()->with('success', 'success');
    }

    public function stock(Request $request)
    {
        $request->validate([
            'stock' => 'required',
        ]);

        $product = Product::where('id', $request->id)->first();

        Product::where('id', $request->id)->update([
            'stock' => $product->stock + $request->stock,
        ]);

        return redirect()->back()->with('success', 'success');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $product = Product::where('id', $request->id)->first();

        if ($request->hasFile('image')) {
            $product_img = time().'.'.$request->image->extension();
            $request->image->move(public_path('product'), $product_img);
        } else {
            $product_img = $product->image_old;
        }

        Product::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $product_img,
        ]);

        return redirect()->back()->with('success', 'success');
    }

    public function delete(Request $request, $id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('success', 'success');
    }

    public function search(Request $request)
    {
        $data['type_menu'] = 'product';
        $search = $request->name_product;
        $data['products'] = Product::where('name', 'like', '%' . $search . '%')->get();


        return view('pages.product.index', $data);
    }
}
