<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function viewTransaction(Request $request)
    {
        $transactions = TransactionHeader::where('user_id',Auth::user()->id)->get();
        return view('/menu/transaction-history',['transactions' => $transactions]);
    }

    public function insertTransaction(Request $request)
    {
        $request->validate([
            'receiverName'=>['required'],
            'receiverAddress'=>['required']
        ]);

        $transactionHeader = TransactionHeader::create([
            'user_id'=>Auth::user()->id,
            'total_price'=>$request->total_price]);

        $carts = Cart::where('user_id',Auth::user()->id)->get();

        foreach ($carts as $cart){
            TransactionDetail::create([
                'transaction_header_id'=>$transactionHeader->id,
                'product_id'=>$cart->product_id,
                'quantity'=>$cart->quantity,
            ]);
        }

        Cart::where('user_id',Auth::user()->id)->delete();

        return redirect('/transaction');
    }
}
