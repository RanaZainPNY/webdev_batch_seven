<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function productindex()
    {
        return view('admin.products_index');
    }
}
