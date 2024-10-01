<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('web.shop');
    }
    public function webCartPage()
    {

        return view('web.cart');
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
