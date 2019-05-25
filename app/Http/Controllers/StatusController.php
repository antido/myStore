<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
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
    
    public function likeProduct($productId)
    {
    	$likeStat = Status::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->first();

    	$stat = $likeStat ? $likeStat : new Status;
    	$stat->user_id = auth()->user()->id;
    	$stat->product_id = $productId;
    	$stat->like = true;
    	$stat->save();

    	return redirect('/product/'.$productId);
    }

    public function bookmarkProduct($productId)
    {
    	$markStat = Status::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->first();

    	$stat = $markStat ? $markStat : new Status;
    	$stat->user_id = auth()->user()->id;
    	$stat->product_id = $productId;
    	$stat->bookmark = true;
    	$stat->save();

    	return redirect('/product/'.$productId);
    }

    public function removeLikeProduct($productId)
    {
    	$likeStat = Status::where(['user_id' => auth()->user()->id, 'product_id' => $productId, 'like' => true])->first();
    	$likeStat->like = false;
    	$likeStat->save();

    	return redirect('/product/'.$productId);
    }

    public function removeBookmarkProduct($productId)
    {
    	$markStat = Status::where(['user_id' => auth()->user()->id, 'product_id' => $productId, 'bookmark' => true])->first();
    	$markStat->bookmark = false;
    	$markStat->save();

    	return redirect('/product/'.$productId);
    }	
}
