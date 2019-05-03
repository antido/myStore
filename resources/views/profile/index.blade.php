@extends('layouts.app')

@section('content')
	<div class="container py-4">
		<div class="row justify-content-center">
			<div class="col-md-2"> 
				<img 
					@if($user->userInfo)
						src="storage/profile_images/{{$user->userInfo->user_image}}" 
					@else
						src="storage/profile_images/noimage.jpg" 
					@endif
				class="img-fluid border border-dark" id="profile-image" alt="Profile image">
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
								{{$user->userInfo->birth_date}}
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
			$('#profile-image').on('mouseenter', function(){
				$(this).css('opacity', 0.8);
			});

			$('#profile-image').on('mouseleave', function(){
				$(this).css('opacity', 1);
			});
		});
	</script>
@endsection