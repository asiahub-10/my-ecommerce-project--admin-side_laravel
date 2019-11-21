@extends('admin.master')

@section('title')
    Update Product
@endsection

@section('body')
    <style>
        .success {
            border-radius: 50%;
            border: 2px solid #d6d8db;
        }
    </style>
    <div class="container">
        @if(Session::has('message'))
            <div class="card-body text-center pb-0">
                <i class="fas fa-2x fa-check text-info p-2 success"></i>
                <h4 class="text-info font-weight-bold">{{ Session::get('message') }}</h4>
            </div>
        @endif

        <div class="card my-5 col-lg-9 col-md-11 mx-auto px-0">
            <div class="card-header bg-gradient-info">
                <h3 class="text-center text-light font-weight-bold font-italic">Add Product</h3>
            </div>
            <div class="card-body col-sm-12">
                {{ Form::open(['route'=>'update-product', 'method'=>'post', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) }}
                <div class="form-group row">
                    <label class="col-md-3">Category Name</label>
                    <div class="col-md-9">
                        <select name="category_id" class="form-control">
                            <option value="" disabled>---Select Category Name---</option>
                            @foreach($categories as $category)
                                @if($category->publication_status == 1)
                                    @if(old('category_id') == null)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @else
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endif
                                @endif
                                @if($category->publication_status != 1)
                                    <option value="{{ $category->id }}" class="" style="color: rgba(232,167,152,0.96);" disabled>{{ $category->category_name }} (unpublished category)</option>
                                @endif
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Brand Name</label>
                    <div class="col-md-9">
                        <select name="brand_id" class="form-control">
                            <option value="" disabled>---Select Brand Name---</option>
                            @foreach($brands as $brand)
                                @if($brand->publication_status == 1)
                                    @if(old('brand_id') == null)
                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                    @else
                                        <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id') ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                    @endif
                                @endif
                                @if($brand->publication_status != 1)
                                    <option value="{{ $brand->id }}"  style="color: rgba(232,167,152,0.96);" disabled>{{ $brand->brand_name }} (unpublished brand)</option>
                                @endif
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3">Product Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="product_name" value="{{ old('product_name') != null ? old('product_name') : $product->product_name }}"/>
                        <input type="hidden" class="form-control" name="id" value="{{ $product->id }}"/>
                        <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3">Product Price</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="product_price"  value="{{ old('product_price') != null ? old('product_price') : $product->product_price }}"/>
                        <span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3">Product Quantity</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="product_quantity" value="{{ old('product_quantity') != null ? old('product_quantity') : $product->product_quantity }}"/>
                        <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Product Short Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="product_short_description" >{{ old('product_short_description') != null ? old('product_short_description') : $product->product_short_description }}</textarea>
                        <span class="text-danger">{{ $errors->has('product_short_description') ? $errors->first('product_short_description') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Product Long Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="product_long_description" id="editor">{{ old('product_long_description') != null ? old('product_long_description') : $product->product_long_description }}</textarea>
                        <span class="text-danger">{{ $errors->has('product_long_description') ? $errors->first('product_long_description') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Product Image</label>
                    <div class="col-md-9">
                        <img src="{{ asset('/') }}{{ $product->product_image }}" id="productImage" alt="Product Image" class="mb-2" width="100" height="100" style="border: 1px solid #bcbcbc;"/>
                        <br/>
                        <input type="file" name="product_image" onchange="showImage.call(this)" class="text-light bg-gradient-info" accept="image/*"/>
                        <br/>
                        <span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        @if(old('publication_status')==null)
                        <label class="mr-3"><input type="radio" name="publication_status" class="mr-1" value="1" {{ $product->publication_status == 1 ? 'checked' : '' }}/>Published</label>
                        <label><input type="radio" name="publication_status" class="mr-1" value="0" {{ $product->publication_status == 0  ? 'checked' : '' }}/>Unpublished</label>
                        @else
                            <label class="mr-3"><input type="radio" name="publication_status" class="mr-1" value="1" {{ old('publication_status') == 1 ? 'checked' : '' }}/>Published</label>
                            <label><input type="radio" name="publication_status" class="mr-1" value="0" {{ old('publication_status') == 0  ? 'checked' : '' }}/>Unpublished</label>
                        @endif
                        <br/>
                        <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3"></label>
                    <div class="col-md-9">
                        <input type="submit" name="btn" class="btn btn-outline-info font-weight-bold btn-block form-control" value="Update Product Info"/>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <script>
        function showImage() {
            if (this.files && this.files[0]) {
                var obj = new FileReader();
                obj.onload = function (data) {
                    var image = document.getElementById('productImage');
                    image.src = data.target.result;
                };
                obj.readAsDataURL(this.files[0]);
            }
        }
    </script>
@endsection