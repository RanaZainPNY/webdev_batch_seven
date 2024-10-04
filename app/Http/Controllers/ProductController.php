<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function editProductForm($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products_edit_form', ['product' => $product]);

    }

    public function updateProduct($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // delete old image
            File::delete(public_path('uploads/products/' . $product->image));

            // Create new image file name
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // unique Image Name

            //save image to the public directory
            $image->move(public_path('uploads/products/'), $imageName);
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('admin-products');
    }
    public function productindex()
    {

        // Query Builder
        // $products = DB::table('products')->get();

        // Eloquent ORM (object relational mapping)
        $products = Product::all();
        return view(
            'admin.products_index',
            ['products' => $products]
        );
    }

    public function createProductPage()
    {
        return view('admin.products_create_form');
    }

    public function storeProductPage(Request $request)
    {
        // dd($request->image);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext; // Unique image name; 29239033.jpg

            // save image to products directory
            $image->move(public_path('/uploads/products'), $imageName);

            // save image in the database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('admin-products');
        // return view('admin.products_create_form');
    }

    public function removeProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image != "") {
            // delete associated image file
            File::delete(public_path('/uploads/products/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin-products');

    }
}
