<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    //
    public function addtocart($id)
    {
        $product = Product::findOrFail($id);

        // $cart = [
        // '1' => ['name'=>'abc', 'sku' => '9838MMN', ......, 'quantity': 1 ],
        // '2' => ['name'=>'def', 'sku' => '9838MMN', ......, 'quantity': 3 ],
        // '3' => ['name'=>'ghi', 'sku' => '9838MMN', ......, 'quantity': 1 ],
        // ]

        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            // if product exists increase its quantity by ones
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "sku" => $product->sku,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
        return redirect()->back();
    }

    public function cartstatus()
    {
        $cart = session()->get('cart');
        dump($cart);
    }

    public function removefromcart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function placeorder(Request $request)
    {
        // dd($request);
        $order = new Order();
        $order->firstname = $request->fname;
        $order->lastname = $request->lname;
        $order->address = $request->address;
        $order->contact = $request->contact;
        $order->email = $request->email;
        $order->notes = $request->notes;

        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['quantity'] * $details['price'];
        }
        $order->total = $total;
        $order->save();

        // Clear cart after placing order
        session()->forget('cart');
        return redirect()->back();

    }
}

