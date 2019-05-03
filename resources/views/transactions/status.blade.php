@extends('layouts.app')

@section('content')
	<div class="container-fluid py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h2 class="text-center mb-4">Transaction Status</h2>
				<table class="table table-striped table-bordered" id="myTable">
					<thead>
						<tr>
							<th>Invoice ID</th>
							<th>Product ID</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>			
		</div>
	</div>
@endsection