@extends('layouts.app')

@section('content')
	<div class="display-section">
		<div class="jumbotron my-0" id="welcome-section">
		  	<h1 class="display-4 text-center">Welcome to <strong class="text-primary"><i class="fas fa-cart-plus"> myStore</i></strong></h1>
		  	<hr>
		  	<p class="lead">A place where you can get products that are affordable and in good quality.</p>
		  	<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
		  	<a class="btn btn-primary btn-lg" href="{{ url('/product') }}" role="button">Go To Store</a>
		</div>
	</div>

	<div class="reviews-section"> 
		<h1 class="display-4 text-center">Reviews</h1>
		<hr class="my-4">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<div class="card-header">
						<p class="text-center">Customer 1</p>
					</div>
				  	<div class="card-body">
				  		<label>Comment:</label><br>
						<small>Awesome products.</small>
				  	</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<div class="card-header">
						<p class="text-center">Customer 2</p>
					</div>
				  	<div class="card-body">
				  		<label>Comment:</label><br>
						<small>Good quality products and fast transaction.</small>
				  	</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<div class="card-header">
						<p class="text-center">Customer 3</p>
					</div>
				  	<div class="card-body">
				  		<label>Comment:</label><br>
						<small>Affordable items.</small>
				  	</div>
				</div>
			</div>
		</div>
	</div>

	<div class="feature-products-section"> 
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		 	<ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  	</ol>
		  	<div class="carousel-inner text-light text-center">
			    <div class="carousel-item active product-image-1">
			    	<div class="jumbotron bg-dark section-text">
			    		<h1 class="display-4">Devices</h1>
			    	</div>
			    </div>
			    <div class="carousel-item product-image-2">
			    	<div class="jumbotron bg-dark section-text">
			    		<h1 class="display-4">Fashion Wear</h1>
			    	</div>
			    </div>
			    <div class="carousel-item product-image-3">
			    	<div class="jumbotron bg-dark section-text">
			    		<h1 class="display-4">Automobiles</h1>
			    	</div>
			    </div>
		  	</div>
		  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
		  	</a>
		  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
		  	</a>
		</div>
	</div>

	<div class="contact-section my-4">
		<div class="container">
			<h1 class="display-4 text-center">Contact Us</h1>
			<hr class="my-4">
			<label><strong>Phone Number:</strong> <span class="text-secondary"> 09296356745</span></label><br> 
			<label><strong>Office Number:</strong> <span class="text-secondary"> 554-56-34</span></label><br> 
			<label><strong>Email Address:</strong> <span class="text-secondary"> myStore@gmail.com</span></label><br>
			<label><strong>Office Address:</strong> <span class="text-secondary"> Baguio City 2600, Philippines</span></label>
		</div>
	</div>
@endsection