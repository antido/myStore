<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseRecord;
use App\AddToCart;
use App\Products;
use App\UserCredit;

class PurchaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function finalizeProductPurchase($cartId, $amount)
    {
        $buyerCredits = UserCredit::where('user_id', auth()->user()->id)->first();
        $invoice = "MS-".mt_rand(1000, 9000)."-".mt_rand(10000, 90000);

        if ($buyerCredits->credits > $amount) {
            $buyerCredits->credits = $buyerCredits->credits - $amount;
            $buyerCredits->save();

            $purchase = new PurchaseRecord;
            $purchase->user_id = auth()->user()->id;
            $purchase->cart_id = $cartId;
            $purchase->invoice = $invoice;
            $purchase->amount = $amount;
            $purchase->save();

            $addToCart = AddToCart::find($cartId);
            $addToCart->is_cart = false;
            $addToCart->is_purchased = true;
            $addToCart->save();
        }

        return 'success';
    }
}
