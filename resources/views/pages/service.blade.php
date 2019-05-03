@extends('layouts.app')

@section('content')
	<div class="container py-4">
		<h1 class="text-center text-secondary display-4"><strong>Services</strong></h1>
		<hr class="my-4">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card border border-dark text-center" style="width: 18rem;">
					<div class="card-header bg-dark">
						<h5 class="text-light">Online Store</h5>
					</div>
				  	<img src="/storage/cover_images/noimage.jpg" class="card-img-top" alt="...">
				  	<div class="card-body bg-dark text-light">
				    	<p class="card-text">Selling User Products</p>
				    	<hr class="bg-light">
				    	<a class="btn btn-primary" href="#">Read More</a>
				  	</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card border border-dark text-center" style="width: 18rem;">
					<div class="card-header bg-dark">
						<h5 class="text-light">Advertisement</h5>
					</div>
				  	<img src="/storage/cover_images/noimage.jpg" class="card-img-top" alt="...">
				  	<div class="card-body bg-dark text-light">
				    	<p class="card-text text-light">Offering Product Advertisement</p>
				    	<hr class="bg-light">
				    	<a class="btn btn-primary" href="#">Read More</a>
				  	</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card border border-dark text-center" style="width: 18rem;">
					<div class="card-header bg-dark">
						<h5 class="text-light">Inventory System</h5>
					</div>
				  	<img src="/storage/cover_images/noimage.jpg" class="card-img-top" alt="...">
				  	<div class="card-body bg-dark text-light">
				    	<p class="card-text text-light">Management of Products</p>
				    	<hr class="bg-light">
				    	<a class="btn btn-primary" href="#">Read More</a>
				  	</div>
				</div>
			</div>
		</div>
	</div>
@endsection