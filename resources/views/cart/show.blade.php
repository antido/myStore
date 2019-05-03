@extends('layouts.app')

@section('content')
	<div class="container py-4">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1 class="text-center text-primary my-4"><i class="fas fa-cart-plus"> Your Cart</i></h1>
				<hr>
				<ul class="list-group list-group-flush">
					@php
						$totalAmount = 0;
					@endphp
					@if(count($productDet) > 0)
						@foreach($productDet as $detail)
							@if($addToCart)
								@if($detail->cart_id == $addToCart->id)
									@if($addToCart->is_cart == true and $addToCart->is_purchased == false)
										<li class="list-group-item  d-flex justify-content-between align-items-center">
											<button type="button" class="btn btn-danger btn-sm" onclick="removeFromCart({{$detail->product->id}}, {{$detail->cart_id}})" title="Remove From Cart"><i class="fas fa-times"></i></button>
											<p>{{$detail->product->name}}</p>
											<p>
												Quantity: <span><input type="number" name="quantity" class="product-quantity" style="width: 15%;" data-product="{{$detail->product->id}}" data-cart="{{$detail->cart_id}}" value="{{$detail->quantity}}"></span>
												Product Price: <span class="badge badge-primary badge-pill total-product-price" id="productPrice-{{$detail->product->id}}" data-price="{{$detail->product->price}}">₱ {{$detail->quantity * $detail->product->price}}</span>
											</p>
											@php
												$productPrice = $detail->quantity * $detail->product->price;
												$totalAmount = $totalAmount + $productPrice;
											@endphp
										</li>
									@endif
								@endif
							@endif
						@endforeach
					@endif
				</ul>
				<p class="float-right my-2 purchase-amount" data-amount="{{$totalAmount}}"><strong>Purchase Total:</strong><span> ₱ {{$totalAmount}}</span></p>
				<a class="clearfix btn btn-primary my-2" href="#" onclick="finalizePurchase({{$addToCart ? $addToCart->id : 0}});">Finalize Purchase</a>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function removeFromCart(productId, cartId) {
			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });

	        $.ajax({
	        	type: "DELETE",
	        	url: "/product/remove-from-cart/" + productId + "/" + cartId,
	        	success: function(data){
	        		window.location.href = "/product/cart/{{Auth::user()->id}}";
	        	}
	        });
		}

		function finalizePurchase(cartId) {
			var totalAmount = $('.purchase-amount').attr('data-amount');

			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });

			if (totalAmount != 0) {
		        $.ajax({
		        	type: "POST",
		        	url: "/purchase/" + cartId + "/" + totalAmount,
		        	success: function(data) {
		        		window.location.reload();
		        	}
		        });
			} else {
				alert('No Product/s In Cart');
			}
		}

		$(document).ready(function(){
			$('.product-quantity').on('focusout', function(){
				var productId = $(this).attr('data-product');
				var cartId = $(this).attr('data-cart');
				var qty = $(this).val();

				$.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            }
		        });

				$.ajax({
					type: "POST",
					url: "/product/add-quantity/" + productId + "/" + cartId + "/" + qty,
					success: function(data){
						window.location.reload();
						// $('#productPrice-'+productId).html('₱' + qty * $('#productPrice-'+productId).attr('data-price'));
					}
				});
			});
		});
	</script>
@endsection