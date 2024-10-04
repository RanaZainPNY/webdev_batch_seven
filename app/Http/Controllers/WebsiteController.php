<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WebsiteController extends Controller
{
    //
    public function fahadPage()
    {
        return view('welcome');
    }

    public function adminMasterPage()
    {
        return view('admin.master');
    }

    public function webMasterPage()
    {
        return view('web.master');
    }

    public function webIndexPage()
    {
        return view('web.index');
    }

    public function webShopPage()
    {
        $products = Product::all();
        return view('web.shop', ['products' => $products]);
    }
    public function webCartPage()
    {

        $products = session()->get('cart');
        // dd($cartproducts);

        return view('web.cart', ['products', $products]);
    }
    public function webCheckoutPage()
    {

        return view('web.checkout');
    }

    public function webContact()
    {

        return view('web.contact');
    }

}
