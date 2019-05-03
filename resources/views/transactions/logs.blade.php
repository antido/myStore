@extends('layouts.app')

@section('content')
	<div class="container-fluid py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h2 class="text-center mb-4">Transaction Logs</h2>
				<table class="table table-striped table-bordered" id="myTable">
					<thead>
						<tr>
							<th>Log ID</th>
							<th>Description</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(count($logs) > 0)
							@foreach($logs as $log)
							<tr>
								<td>{{$log->id}}</td>
								<td>{{$log->description}}</td>
								<td>{{$log->created_at->format('F j, Y')}}</td>
								<td></td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection