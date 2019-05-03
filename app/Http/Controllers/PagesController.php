<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Products;

class PagesController extends Controller
{
    public function index()
    {
    	return view('pages.index');
    }

    public function about()
    {
    	return view('pages.about');
    }

    public function service()
    {
    	return view('pages.service');
    }
}
