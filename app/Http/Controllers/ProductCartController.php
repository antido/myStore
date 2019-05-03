<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddToCart;
use App\Country;
use App\Products;
use App\ProductDetail;

class ProductCartController extends Controller
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

	public function showUserCart($userId)
	{
		$productDet = ProductDetail::all();
		$data = ['user_id' => $userId, 'is_cart' => true, 'is_purchased' => false];
		$addToCart = AddToCart::where($data)->first();

        return view('cart.show')->with(['productDet' => $productDet, 'addToCart' => $addToCart]);
	}

    public function storeProductToCart($productId)
    {
    	$userId = auth()->user()->id;
    	$data = ['user_id' => $userId, 'is_cart' => true, 'is_purchased' => false];
    	$userCart = AddToCart::where($data)->first();

    	if ($userCart) {
    		$productDet = new ProductDetail;
	    	$productDet->product_id = $productId;
	    	$productDet->cart_id = $userCart->id;
	    	$productDet->quantity = 1;
	    	$productDet->save();
    	} else {
	    	$addToCart = new AddToCart;
	    	$addToCart->user_id = $userId;
	    	$addToCart->is_cart = true;
	    	$addToCart->is_purchased = false;
	    	$addToCart->save();

	    	$productDet = new ProductDetail;
	    	$productDet->product_id = $productId;
	    	$productDet->cart_id = $addToCart->id;
	    	$productDet->quantity = 1;
	    	$productDet->save();
    	}

    	return 'Success';
    }

    public function removeProductFromCart($productId, $cartId)
    {
    	$data = ['product_id' => $productId, 'cart_id' => $cartId];
    	$productDet = ProductDetail::where($data);
    	$productDet->delete();

    	return 'success';
    }

    public function storeProductQuantity($productId, $cartId, $qty)
    {
    	$data = ['product_id' => $productId, 'cart_id' => $cartId];
    	$productDet = ProductDetail::where($data)->first();
    	$productDet->quantity = $qty;
    	$productDet->save();

    	return 'success';
    }
}
