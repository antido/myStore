@extends('layouts.app')

@section('content')
	<a class="btn btn-dark ml-2" href="{{ url('/home') }}"><i class="fas fa-arrow-circle-left"> Back</i></a>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 bg-primary text-light rounded">
				<h1 class="text-center my-3"><i class="fas fa-user-edit"> Update Product</i></h1>
				<hr class="my-2 bg-light">
				{!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="form-group">
						{{Form::label('product_name', 'Product Name:')}}
						{{Form::text('product_name', $product->name, ['class' => 'form-control', 'placeholder' => 'Enter Product Name'])}}
					</div>
					<div class="form-group">
						{{Form::label('product_description', 'Product Description:')}}
						{{Form::textarea('product_description', $product->description, ['class' => 'form-control', 'placeholder' => 'Enter Product Description'])}}
					</div>
					<div class="form-group">
						{{Form::label('product_price', 'Product Price:')}}
						{{Form::text('product_price', $product->price, ['class' => 'form-control', 'placeholder' => 'Enter Product Price'])}}
					</div>
					<div class="form-group">
						{{Form::label('product_quantity', 'Product Quantity:')}}
						{{Form::number('product_quantity', $product->quantity, ['class' => 'form-control', 'placeholder' => 'Enter Product Quantity'])}}
					</div>
					<div class="form-group">
						{{Form::label('product_category', 'Product Category')}}
						{{Form::select('product_category', $categories, $product->category_id, ['class' => 'form-control', 'placeholder' => 'Select Product Category'])}}
					</div>
					<div class="form-group">
						{{Form::file('cover_image')}}
					</div>
					<div class="form-group">
						{{Form::hidden('_method', 'PUT')}}
						{{Form::submit('Submit', ['class' => 'btn btn-dark form-control'])}}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection