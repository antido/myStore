<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Products;
use App\AddToCart;
use App\ProductDetail;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'displayProductsByCategory']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->sortBy('name');
        $products = Products::orderBy('created_at', 'asc')->paginate(9);

        return view('products.index')->with(['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');

        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
                        array(
                            'product_name' => 'required',
                            'product_description' => 'required',
                            'product_price' => 'required',
                            'product_quantity' => 'required',
                            'product_category' => 'required',
                            'cover_image' => 'image|nullable|max:1999',
                        ));

        if ($request->hasFile('cover_image')) {
            $fileNameExtension = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathInfo($fileNameExtension, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $product = new Products;
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');
        $product->price = $request->input('product_price');
        $product->quantity = $request->input('product_quantity');
        $product->user_id = auth()->user()->id;
        $product->category_id = $request->input('product_category');
        $product->cover_image = $fileNameToStore;
        $product->save();

        return redirect('/home')->with('success', 'Product Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        if (auth()->user()) {
            $data = ['user_id' => auth()->user()->id, 'is_cart' => true, 'is_purchased' => false];
        } else {
            $data = ['is_cart' => true, 'is_purchased' => false];
        }

        $userCart = AddToCart::where($data)->first();
        $productDet = ProductDetail::where('product_id', $id)->first();

        return view('products.show')->with(['product' => $product, 'userCart' => $userCart, 'productDet' => $productDet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->sortBy('name')->pluck('name', 'id');
        $product = Products::find($id);

        if (auth()->user()->id !== $product->user_id) {
            return redirect('/product')->with('error', 'Unauthorized Page');
        }

        return view('products.edit')->with(['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('cover_image')) {
            $fileNameExtension = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathInfo($fileNameExtension, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } 

        $product = Products::find($id);
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');
        $product->price = $request->input('product_price');
        $product->quantity = $request->input('product_quantity');
        $product->category_id = $request->input('product_category');

        if ($request->hasFile('cover_image')) {
            $product->cover_image = $fileNameToStore;
        }

        $product->save();

        return redirect('/home')->with('success', 'Product Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);

        if (auth()->user()->id !== $product->user_id) {
            return redirect('/product')->with('error', 'Unauthorized Page');
        }

        if ($product->cover_image !== 'noimage.jpg') {
            Storage::delete('public/cover_images/'.$product->cover_image);
        }

        $product->delete();

        return 'success';
    }

    /**
     * Display a listing of the resource by categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayProductsByCategory($id)
    {
        $categories = Category::all()->sortBy('name');
        $productCategory = Products::where('category_id', $id)->orderBy('created_at', 'asc')->paginate(9);
        
        return view('products.index')->with(['products' => $productCategory, 'categories' => $categories]);
    }
}
