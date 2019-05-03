@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-success my-2" href="{{ url('/product/create') }}" title="Add Product"><i class="fas fa-plus"></i></a>
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th style="width: 10%;">Image</th>
                                <th>Name</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>
                                            <img src="/storage/cover_images/{{$product->cover_image}}" style="width: 100%;" alt="Product image" class="img-thumbnail">
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->created_at->format('F j, Y')}}</td>
                                        <td>
                                            <a class="btn btn-secondary" href="/product/{{$product->id}}" title="View Product"><i class="fas fa-eye text-light"></i></a>
                                            <a class="btn btn-primary" href="/product/{{$product->id}}/edit" title="Edit Product"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger del-product-btn" href="#" onclick="return confirm('Are you sure ?');" data-product="{{$product->id}}" title="Delete Product"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <center>No Result Found</center>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.del-product-btn').on('click', function(){
            var productId = $(this).attr('data-product');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/product/" + productId,
                success: function(data){
                    window.location.href = "/home";
                }
            });
        });
    });
</script>
@endsection
