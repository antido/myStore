@extends('layouts.app')

@section('content')
	<div class="container py-4">
		<div class="row justify-content-center">
			<div class="col-md-2"> 
				@if($user->userInfo and $user->userInfo->user_image)
					<img src="storage/profile_images/{{$user->userInfo->user_image}}" class="img-fluid border border-dark" id="profile-image" alt="Profile image">
				@else
					<img src="img/noimage.jpg" class="img-fluid border border-dark" id="profile-image" alt="Profile image">
				@endif
				@if($user->userInfo)
					@if($user->userInfo->user_image == null or $user->userInfo->user_image == 'noimage.jpg')
						<center><button type="button" class="btn btn-sm btn-success mt-2 profile-img">Add Photo</button></center>
					@else
						<center><button type="button" class="btn btn-sm btn-primary mt-2 profile-img">Update Photo</button></center>
					@endif
				@endif
				<div class="image-section" style="display: none;">
					@if($user->userInfo)
						<form method="POST" action="{{ action('ProfileController@addProfileImage', $user->userInfo->id) }}" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<input type="file" class="mt-2" id="addUserImg" name="user_image">
							</div>
							<div class="form-group">
								@method('PUT')
								<input type="submit" class="btn btn-sm btn-success" name="save_image" value="Save">
								<input type="button" class="btn btn-sm btn-danger" id="cancelImgBtn" name="cancel_image" value="Cancel">
							</div>
						</form>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<label><strong>Name: </strong> 
							@if($user->userInfo)
								{{$user->userInfo->first_name}} {{$user->userInfo->middle_name}} {{$user->userInfo->last_name}}
							@else
								N/A
							@endif
						</label> 
					</li>
					<li class="list-group-item">
						<label><strong>Age: </strong> 
							@if($user->userInfo)
								{{$user->userInfo->age}}
							@else
								N/A
							@endif
						</label> 
					</li>
					<li class="list-group-item">
						<label><strong>Gender: </strong> 
							@if($user->userInfo)
								{{$user->userInfo->gender}}
							@else
								N/A
							@endif
						</label> 
					</li>
					<li class="list-group-item">
						<label><strong>Birth Date: </strong> 
							@if($user->userInfo)
								{{date('F j, Y', strtotime($user->userInfo->birth_date))}}
							@else
								N/A
							@endif
						</label>
					</li>
					<li class="list-group-item">
						<label><strong>Phone Number: </strong> 
							@if($user->userInfo)
								{{$user->userInfo->phone_number}}
							@else
								N/A
							@endif
						</label>
					</li>
					<li class="list-group-item">
						<label><strong>Email Address: </strong>
							@if($user->userInfo) 
								{{$user->email}}
							@else
								N/A
							@endif
						</label>
					</li>
					<li class="list-group-item">
						<label><strong>Home Address: </strong> 
							@if($user->userInfo)
								{{$user->userInfo->home_address}}, 
								@if($user->userInfo->country)
									{{$user->userInfo->country->name}}
								@else
									N/A
								@endif
							@else
								N/A
							@endif
						</label>
					</li>
				</ul>
				@if($user->userInfo)
					<a class="btn btn-primary float-right mt-2" href="/profile/{{$user->id}}/edit" title="Edit Information"><i class="fas fa-edit"></i></a>
				@else
					<a class="btn btn-success float-right mt-2" href="{{ url('/profile/create') }}" title="Add Information"><i class="fas fa-user-plus"></i></a>
				@endif
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.profile-img').on('click', function(){
				$(this).css('display', 'none');
				$('.image-section').css('display', 'block');
			});

			$('#cancelImgBtn').on('click', function(){
				$('#addUserImg').val('');
				$('.profile-img').css('display', 'block');
				$('.image-section').css('display', 'none');
			});
		});
	</script>
@endsection