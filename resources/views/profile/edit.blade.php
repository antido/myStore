@extends('layouts.app')

@section('content')
	<div class="container-fluid py-4">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<h2 class="text-center text-primary my-3"><i class="fas fa-edit"> Update Information</i></h2>
				<hr class="my-4">
				<form method="POST" action="{{ action('ProfileController@update', $user->userInfo->id) }}">
					@csrf
					<div class="form-group">
						<label>Firstname:</label>
						<input type="text" class="form-control" name="first_name" value="{{$user->userInfo->first_name}}">
					</div>
					<div class="form-group">
						<label>Middlename:</label>
						<input type="text" class="form-control" name="middle_name" value="{{$user->userInfo->middle_name}}">
					</div>
					<div class="form-group">
						<label>Lastname:</label>
						<input type="text" class="form-control" name="last_name" value="{{$user->userInfo->last_name}}">
					</div>
					<div class="form-group">
						<label>Age:</label>
						<input type="number" class="form-control" name="age" value="{{$user->userInfo->age}}">
					</div>
					<div class="form-group">
						<label>Gender:</label>
						<select class="form-control" name="gender">
							<option value="">Select From Options</option>
							<option value="Male" 
								@if($user->userInfo->gender == "Male")
									selected="selected" 
								@endif
							>Male</option>
							<option value="Female"
								@if($user->userInfo->gender == "Female")
									selected="selected" 
								@endif
							>Female</option>
							<option value="LGBTQ"
								@if($user->userInfo->gender == "LGBTQ") 
									selected="selected" 
								@endif
							>LGBTQ</option>
						</select>
					</div>
					<div class="form-group"> 
						<label>Birth Date:</label>
						<input type="date" class="form-control" name="birth_date" value="{{$user->userInfo->birth_date}}">
					</div>
					<div class="form-group">
						<label>Phone Number:</label>
						<input type="text" class="form-control" name="phone_number" value="{{$user->userInfo->phone_number}}">
					</div>
					<div class="form-group">
						<label>Home Address:</label>
						<input type="text" class="form-control" name="home_address" value="{{$user->userInfo->home_address}}">
					</div>
					<div class="form-group">
						<label>Country:</label>
						<select class="form-control" name="country">
							<option value="">Select Country</option>
							@foreach($countries as $country)
								<option value="{{$country->id}}"
									@if($country->id)
										selected="selected"
									@endif
									>{{$country->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						@method('PUT')
						<input type="submit" class="form-control btn btn-primary" name="Submit" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection