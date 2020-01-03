@extends('admin.master')

@section('title')
    Product Details
@endsection

@section('body')
    <div class="container my-4">
        <div class="row">
            <div class="mx-auto col-lg-10">
                <div class="card-header bg-gradient-info">
                    <h4 class="text-light text-center">Product Details</h4>
                </div>
                <div class="card-body bg-white table-responsive">
                    <table class="table">
                        <tr>
                            <th width="35%">Product Id:</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th width="35%">Category Name:</th>
                            <td>{{ $product->category->category_name }}</td>
                        </tr>
                        <tr>
                            <th width="35%">Brand Name:</th>
                            <td>{{ $product->brand->brand_name }}</td>
                        </tr>
                        <tr>
                            <th width="35%">Product Name:</th>
                            <td>{{ $product->product_name }}</td>
                        </tr>
                        <tr>
                            <th width="35%">Product Price:</th>
                            <td>&#2547; {{ number_format($product->product_price, 2) }}</td>
                        </tr>
                        <tr>
                            <th width="35%">Product Quantity:</th>
                            <td>{{ $product->product_quantity }}</td>
                        </tr>
                        <tr>
                            <th width="35%">Product Short Description:</th>
                            <td>{{ $product->product_short_description }}</td>
                        </tr>
                        <tr>
                            <th width="35%">Product Long Description:</th>
                            <td>{!! $product->product_long_description !!}</td>
                        </tr>
                        <tr>
                            <th width="35%">Product Image:</th>
                            <td>
                                <img src="{{ asset($product->product_image) }}" alt="Product Image" height="100" width="100"/>
                            </td>
                        </tr>
                        <tr>
                            <th width="35%">Publication Status:</th>
                            <td>{{ $product->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
