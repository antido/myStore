@extends('layouts.app')

@section('content')
	<div class="container-fluid py-4">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<h2 class="text-center text-success my-3"><i class="fas fa-user-plus"> Add Information</i></h2>
				<hr class="my-4">
				<form method="POST" action="{{ action('ProfileController@store') }}">
					@csrf
					<div class="form-group">
						<label>Firstname:</label> 
						<input type="text" class="form-control" name="first_name" placeholder="Enter Firstname">
					</div>
					<div class="form-group">
						<label>Middlename:</label>
						<input type="text" class="form-control" name="middle_name" placeholder="Enter Middlename">
					</div>
					<div class="form-group">
						<label>Lastname:</label>
						<input type="text" class="form-control" name="last_name" placeholder="Enter Lastname">
					</div>
					<div class="form-group">
						<label>Age:</label>
						<input type="number" class="form-control" name="age" placeholder="Enter Age">
					</div>
					<div class="form-group">
						<label>Gender:</label>
						<select class="form-control" name="gender">
							<option value="">Select From Options</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="LGBTQ">LGBTQ</option>
						</select>
					</div>
					<div class="form-group">
						<label>Birth Date:</label>
						<input type="date" class="form-control" name="birth_date" placeholder="Enter Birth Date">
					</div>
					<div class="form-group">
						<label>Phone Number:</label>
						<input type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number">
					</div>
					<div class="form-group">
						<label>Home Address:</label>
						<input type="text" class="form-control" name="home_address" placeholder="Enter Home Address">
					</div>
					<div class="form-group">
						<label>Country:</label>
						<select class="form-control" name="country">
							<option value="">Select Country</option> 
							@foreach($countries as $country)
								<option value="{{$country->id}}">{{$country->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-success" name="Submit" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection