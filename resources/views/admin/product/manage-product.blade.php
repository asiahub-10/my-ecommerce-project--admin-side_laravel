@extends('admin.master')

@section('title')
    Manage Product
@endsection

@section('body')

    <div class="">
        @if(Session::has('message'))
            <div class="card-body text-center pb-0 alert">
                <button type="button" class="close text-danger" data-dismiss="alert">x</button>
                <i class="fas fa-2x fa-check text-info p-2 success"></i>
                <h4 class="text-info font-weight-bold ">{{ Session::get('message') }}</h4>
            </div>
        @endif


        <div class="my-3 col-sm-12 mx-auto px-0">
            <div class="table-responsive text-center">
                <table id="zero_config" class="table table-striped table-bordered table-light table-hover">
                    <thead class="bg-gradient-info text-light">
                    <tr>
                        <th>SL No.</th>
                        <th>Category Name</th>
                        <th>Blog Name</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($products as $product)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $product->category_name }}</th>
                            <th>{{ $product->brand_name }}</th>
                            <th>{{ $product->product_name }}</th>
                            <th>
                                <img src="{{ asset('/') }}{{ $product->product_image }}" alt="Product Image" width="70" height="70"/>
                            </th>
                            <th>&#2547;{{ number_format($product->product_price, 2) }}</th>
                            <th>
                                @if($product->product_quantity > 5)
                                    <p class="text-success ">{{ $product->product_quantity }}</p>
                                @elseif($product->product_quantity > 0 && $product->product_quantity < 6)
                                    <p class="text-warning font-weight-bold">{{ $product->product_quantity }}</p>
                                @else
                                    <p class="text-danger font-weight-bold">{{ $product->product_quantity }}</p>
                                @endif
                            </th>
                            <th>
                                @if($product->publication_status == 1)
                                    <p class="text-success">Published</p>
                                @else
                                    <p class="text-warning">Unpublished</p>
                                @endif
                            </th>
                            <th class="custom-control-inline border-0">
                                <a href="{{ route('view-product-detail', ['id'=>$product->id]) }}" class="btn mr-1 btn-primary" title="View Details"><i class="fas fa-search-plus"></i></a>
                                <a href="{{ route('edit-product', ['id'=>$product->id]) }}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                @if($product->publication_status == 0)
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to publish this product ???');
                                            if (check) {
                                            document.getElementById('publishProductForm'+'{{ $product->id }}').submit();
                                            }
                                            " class="btn btn-success mx-1" title="Publish"><i class="fas fa-cloud-upload-alt"></i></a>
                                    <form id="publishProductForm{{ $product->id }}" action="{{ route('publish-product') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id"/>
                                    </form>

                                @else
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to unpublish this product ???');
                                            if (check) {
                                            document.getElementById('unpublishProductForm'+'{{ $product->id }}').submit();
                                            }
                                            " class="btn btn-warning mx-1" title="Unpublish"><i class="fas fa-cloud-download-alt"></i></a>
                                    <form id="unpublishProductForm{{ $product->id }}" action="{{ route('unpublish-product') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id"/>
                                    </form>
                                @endif

                                <a href="#" onclick="
                                        event.preventDefault();
                                        var check = confirm('Are you sure to delete this product ???');
                                        if (check) {
                                        document.getElementById('deleteProductForm'+'{{ $product->id }}').submit();
                                        }
                                        " class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i>

                                </a>
                                <form id="deleteProductForm{{ $product->id }}" action="{{ route('delete-product') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id"/>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                    <tr>
                        <th>SL No.</th>
                        <th>Category Name</th>
                        <th>Blog Name</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection