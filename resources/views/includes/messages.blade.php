<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4">
			@if(count($errors) > 0)
				@foreach($errors->all() as $error)
					<div class="alert alert-danger text-center">
						{{$error}}
					</div>
				@endforeach
			@endif

			@if(session('success'))
				<div class="alert alert-success text-center">
					{{session('success')}}
				</div>
			@endif

			@if(session('error'))
				<div class="alert alert-danger text-center">
					{{session('error')}}
				</div>
			@endif
		</div>
	</div>
</div>