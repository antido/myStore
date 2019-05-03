@extends('layouts.app')

@section('content')
	<div class="container py-4">
		<div class="jumbotron">
		  	<h1 class="display-5 text-center text-dark"><strong>{{$product->name}}</strong></h1>
		  	<hr class="mt-2">
		  	<div class="row">
		  		<div class="col-md-8">
		  			<img style="width:100%;" src="/storage/cover_images/{{$product->cover_image}}" class="card-img-top border border-dark" alt="Vans Shoes">
		  		</div>
		  		<div class="col-md-4">
		  			<label class="text-info"><strong>Description:</strong></label>
		  			<p>{{$product->description}}</p>
		  			<label class="text-info"><strong>Price:</strong></label>
		  			<p>₱ {{$product->price}}</p>
		  			<label class="text-info"><strong>Available Quantity:</strong></label>
		  			<p>{{$product->quantity}}</p>
		  			<label class="text-info"><strong>Product Category:</strong></label>
		  			<p>{{$product->category->name}}</p>
		  			@if(!Auth::guest())
		  				@if($userCart and $productDet)
  							@if($productDet->product->id == $product->id)
  								<span class="badge badge-success badge-pill">Added To Cart</span>
  							@endif
						@else
							<button type="button" class="btn btn-primary btn-lg" id="addToCartBtn" onclick="addToCart()" title="Add To Cart"><i class="fas fa-cart-plus"></i></button> 
		  				@endif
		  			@endif
		  		</div>
		  	</div>
		  	<hr class="my-4">
		  	<span class="text-secondary">Posted {{$product->created_at->format('F j, Y')}}</span><br>
		  	<label><strong>Seller: </strong></label><br>
		  	<span class="text-secondary ml-5"><strong>Name: </strong> 
		  		@if($product->user->userInfo)
		  			{{$product->user->userInfo->first_name}} {{$product->user->userInfo->middle_name}} {{$product->user->userInfo->last_name}}
		  		@else
		  			{{$product->user->name}}
		  		@endif
		  	</span><br>
		  	<span class="text-secondary ml-5"><strong>Country: </strong> 
		  		@if($product->user->userInfo)
		  			@if($product->user->userInfo->country)
		  				{{$product->user->userInfo->country->name}}
		  			@else
		  				N/A
		  			@endif
	  			@else
	  				N/A
		  		@endif
		  	</span><br>
		  	<span class="text-secondary ml-5"><strong>Email: </strong> {{$product->user->email}}</span>
		</div>
	</div>

	<script type="text/javascript">
		function addToCart() {
			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });

			$.ajax({
				type: "POST",
				url: "/product/add-to-cart/{{$product->id}}",
				success: function(data){
					window.location.href = "/product/{{$product->id}}";
				}
			});
		}
	</script>
@endsection