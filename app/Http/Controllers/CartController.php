<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    //
    public function viewCart()
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $total = 0;
        foreach ($carts as $cart)
        {
            $product = Product::where('product_id',$cart->product_id)->first();
            $total +=$product->price *$cart->quantity;
        }
        return view('/menu/cart-list',['carts'=>$carts,'total'=>$total]);
    }

    public function insertCart(Request $request)
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $request->validate([
            'quantity' => ['required','numeric', 'min:1'],
        ]);

        Cart::updateOrCreate(['user_id'=>Auth::user()->id,'product_id'=>$request->product_id],
            ['quantity'=>$request->quantity]);

        return redirect('/cart');
    }

    public function deleteCart(Request $request)
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        Cart::destroy($request->id);
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $total = 0;
        foreach ($carts as $cart)
        {
            $product = Product::where('product_id',$cart->product_id)->first();
            $total +=$product->price *$cart->quantity;
        }
        return redirect('/cart');
    }
}
