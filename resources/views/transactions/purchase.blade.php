@extends('layouts.app')

@section('content')
	<div class="container-fluid py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h2 class="text-center mb-4">Products Purchased</h2>
				<table class="table table-striped table-bordered" id="myTable">
					<thead>
						<tr>
							<th>Invoice #</th>
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Purchase Quantity</th>
							<th>Purchase Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(count($purchases) > 0)
							@foreach($purchases as $purchase)
								@if($addToCart)
									<tr>
										<td>{{$purchase->invoice}}</td>
										<td>
											@foreach($addToCart as $cart)
												@if($purchase->cart_id == $cart->id)
													@foreach($productDet as $detail)
														@if($detail->cart_id == $cart->id)
															{{$detail->product->id}} <br/>
														@endif
													@endforeach
												@endif
											@endforeach
										</td>
										<td>
											@foreach($addToCart as $cart)
												@if($purchase->cart_id == $cart->id)
													@foreach($productDet as $detail)
														@if($detail->cart_id == $cart->id)
															{{$detail->product->name}} <br/>
														@endif
													@endforeach
												@endif
											@endforeach
										</td>
										<td>
											@foreach($addToCart as $cart)
												@if($purchase->cart_id == $cart->id)
													@foreach($productDet as $detail)
														@if($detail->cart_id == $cart->id)
															{{$detail->quantity}} <br/>
														@endif
													@endforeach
												@endif
											@endforeach
										</td>
										<td>
											@foreach($addToCart as $cart)
												@if($purchase->cart_id == $cart->id)
													@foreach($productDet as $detail)
														@if($detail->cart_id == $cart->id)
															{{$detail->product->price * $detail->quantity}} <br/>
														@endif
													@endforeach
												@endif
											@endforeach
										</td>
										<td></td>
									</tr>
								@endif
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection