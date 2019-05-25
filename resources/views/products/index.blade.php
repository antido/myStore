@extends('layouts.app')

@section('content')
	<div class="container py-4">
		<ul class="nav justify-content-center">
			<li class="nav-item">
		    	<a class="nav-link text-primary" href="{{ url('/product') }}">All</a>
		  	</li>
			@if(count($categories) > 0)
				@foreach($categories as $category)
				  	<li class="nav-item">
				    	<a class="nav-link text-primary" data-category="{{$category->id}}" href="/product/category/{{$category->id}}">{{$category->name}}</a>
				  	</li>
			  	@endforeach
		  	@endif
		</ul>
		
		<div class="row my-5 justify-content-center">
			<div class="col-md-10">
				@if(count($products) > 0)
					<div class="card-columns">
						@foreach($products as $product)
							<div class="card text-center" style="width: 100%;">
							  	<div class="card-header bg-success text-light">
							    	<span>{{$product->name}}</span>
							  	</div>
							  	@if($product->cover_image !== 'noimage.jpg' and file_exists(public_path("/storage/cover_images/".$product->cover_image)))
							  		<img style="width: 50%;" src="/storage/cover_images/{{$product->cover_image}}" class="card-img-top" alt="Product Image">
							  	@else
							  		<img style="width: 50%;" src="/img/noimage.jpg" class="card-img-top" alt="Product Image">
							  	@endif
							  	<div class="card-body">
							    	<h5 class="card-title"></h5>
							    	<p class="card-text">₱ {{$product->price}}</p>
							    	<a href="/product/{{$product->id}}" class="btn btn-primary"><i class="fas fa-eye text-dark"></i> View Product</a>
							  	</div>
							  	<div class="card-footer bg-success text-light">
							    	<small>Posted {{$product->created_at->format('F j, Y')}} by {{$product->user->name}}</small>
							  	</div>
							</div>
						@endforeach
					</div>
				@else
					<p class="text-center text-secondary">No Result Found</p>
				@endif
			</div>
		</div>

		<div class="row justify-content-center">
			{{$products->links()}}
		</div>
	</div>
@endsection