@extends('admin.master')

@section('title')
    Add Product
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
                {{ Form::open(['route'=>'save-product', 'method'=>'post', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) }}
                <div class="form-group row">
                    <label class="col-md-3">Category Name</label>
                    <div class="col-md-9">
                        <select name="category_id" class="form-control">
                            <option value="" selected disabled>---Select Category Name---</option>
                            @foreach($categories as $category)
                            @if($category->publication_status == 1)
                                <option value="{{ $category->id }}" {{ old('category_id') != null && $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->category_name }}</option>
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
                            <option value="" disabled selected>---Select Brand Name---</option>
                            @foreach($brands as $brand)
                                @if($brand->publication_status == 1)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') != null && $brand->id == old('brand_id') ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
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
                        <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}"/>
                        <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3">Product Price</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="product_price"  value="{{ old('product_price') }}"/>
                        <span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3">Product Quantity</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="product_quantity" value="{{ old('product_quantity') }}"/>
                        <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Product Short Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="product_short_description" >{{ old('product_short_description') }}</textarea>
                        <span class="text-danger">{{ $errors->has('product_short_description') ? $errors->first('product_short_description') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Product Long Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="product_long_description" id="editor">{{ old('product_long_description') }}</textarea>
                        <span class="text-danger">{{ $errors->has('product_long_description') ? $errors->first('product_long_description') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Product Image</label>
                    <div class="col-md-9">
                        <input type="file" name="product_image" onchange="showImage.call(this)" class="text-light bg-gradient-info" multiple accept="image/*" />
                        <br/>
                        <img src="" id="productImage" alt="Product Image" class="mt-2" width="100" height="100" style="border: 1px solid #bcbcbc; display: none;"/>
                        <span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        <label class="mr-3"><input type="radio" name="publication_status" class="mr-1" value="1" {{ old('publication_status') == 1 ? 'checked' : '' }}/>Published</label>
                        <label><input type="radio" name="publication_status" class="mr-1" value="0" {{ old('publication_status') !=null && old('publication_status') != 1  ? 'checked' : '' }}/>Unpublished</label>
                        <br/>
                        <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3"></label>
                    <div class="col-md-9">
                        <input type="submit" name="btn" class="btn btn-outline-info font-weight-bold btn-block form-control" value="Save Product Info"/>
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
                    image.style.display = 'block';
                };
                obj.readAsDataURL(this.files[0]);
            }
        }
    </script>
@endsection