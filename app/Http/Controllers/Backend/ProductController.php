<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('backend.product.create');
    }

    public function store(Request $request)
    {
        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $image = $request->image;

        if ($image) {
            $path = 'assets/product-imges';
            $imageName = time() . rand() . '.' . $image->extension();

            $image->move($path, $imageName);
            $product->image = $path . $imageName;
        }

        $product->save();

        return back()->with('message', 'Product Added Successfully');
    }

    public function index()
    {
        return view('backend.product.index', ['products' => Product::all()]);
    }

    public function edit(int $id)
    {
        return view('backend.product.edit', ['products' => Product::find($id)]);
    }

    public function update(Request $request, int $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $image = $request->image;

        if ($image) {
            if (file_exists($product->image)) {
                unlink($product->image);
            }
            $path = 'assets/product-imges';
            $imageName = time() . rand() . '.' . $image->extension();

            $image->move($path, $imageName);
            $product->image = $path . $imageName;
        }

        $product->save();

        return back()->with('message', 'Product Updated Successfully');
    }

    public function delete(int $id)
    {
        $product = Product::find($id);


        if (file_exists($product->image)) {
            unlink($product->image);
        }

        $product->delete();

        return back()->with('message', 'Product Deleted Successfully');
    }
}
