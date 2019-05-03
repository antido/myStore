@extends('layouts.app')

@section('content')
	<div class="container py-4">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1 class="text-center text-primary my-4"><i class="fas fa-cart-plus"> Your Cart</i></h1>
				<hr>
				<ul class="list-group list-group-flush">
					<li class="list-group-item  d-flex justify-content-between align-items-center">
						Product 1
						<p>Quantity: <span class="badge badge-primary badge-pill">14</span></p>
						<p>Total Price: <span class="badge badge-primary badge-pill">14</span></p>
						<button type="button" class="btn btn-danger btn-sm" title="Remove From Cart"><i class="fas fa-times"></i></button>
					</li>
					<li class="list-group-item  d-flex justify-content-between align-items-center">
						Product 2
						<p>Quantity: <span class="badge badge-primary badge-pill">15</span></p>
						<p>Total Price: <span class="badge badge-primary badge-pill">15</span></p>
						<button type="button" class="btn btn-danger btn-sm" title="Remove From Cart"><i class="fas fa-times"></i></button>
					</li>
				</ul>
				<a class="btn btn-primary float-right my-2" href="#">Finalize Purchase</a>
			</div>
		</div>
	</div>
@endsection