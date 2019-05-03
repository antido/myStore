<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Products;
use App\User;
use App\PurchaseRecord;
use App\AddToCart;
use App\ProductDetail;

class TransactionsController extends Controller
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

    public function purchase()
    {
        $purchases = PurchaseRecord::where('user_id', auth()->user()->id)->get();
        $data = ['user_id' => auth()->user()->id, 'is_cart' => false, 'is_purchased' => true];
        $addToCart = AddToCart::where($data)->get();
        $productDet = ProductDetail::all();

    	return view('transactions.purchase')->with(['purchases' => $purchases, 'addToCart' => $addToCart, 'productDet' => $productDet]);
    }

    public function status()
    {
    	return view('transactions.status');
    }

    public function log()
    {
    	return view('transactions.logs');
    }

    public function map()
    {
    	return view('transactions.map');
    }
}
