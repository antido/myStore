@extends('layouts.app')

@section('content')
	<div class="container-fluid py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h2 class="text-center mb-4">Products Status</h2>
				<table class="table table-striped table-bordered" id="myTable">
					<thead>
						<tr>
							<th>User Name</th>
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(count($productStat) > 1)
							@foreach($productStat as $stat)
								@if($stat->like == true or $stat->bookmark == true)
									@if($stat->product->user->id == Auth::user()->id)
										<tr>
											<td>{{$stat->user->userInfo->first_name}} {{$stat->user->userInfo->middle_name}} {{$stat->user->userInfo->last_name}}</td>
											<td>{{$stat->product->id}}</td>
											<td>{{$stat->product->name}}</td>
											<td>
												@if($stat->like == true and $stat->bookmark == false)
													Liked
												@elseif($stat->bookmark == true and $stat->like == false)
													Bookmarked
												@elseif($stat->like == true and $stat->bookmark == true)
													Liked and Bookmarked
												@endif
											</td>
											<td></td>
										</tr>
									@endif
								@endif
							@endforeach
						@else
							<tr>
								<td colspan="5" class="text-center">No Result</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>			
		</div>
	</div>
@endsection