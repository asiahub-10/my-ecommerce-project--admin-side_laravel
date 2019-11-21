@extends('admin.master')

@section('title')
    Update Slider
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
                <h3 class="text-center text-light font-weight-bold font-italic">Add Slider</h3>
            </div>
            <div class="card-body col-sm-12">
                {{ Form::open(['route'=>'update-slider', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) }}
                <div class="form-group row">
                    <label for="" class="col-md-3">Slider Title</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="slider_title" value="{{ old('slider_title') != null ? old('slider_title') : $slider->slider_title }}"/>
                        <input type="hidden" class="form-control" name="id" value="{{ $slider->id }}"/>
                        <span class="text-danger">{{ $errors->has('slider_title') ? $errors->first('slider_title') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Slider Image</label>
                    <div class="col-md-9">
                        <input type="file" name="slider_image" onchange="showImage.call(this)" class="text-light bg-gradient-info" accept="image/*" />
                        <br/>
                        <img src="{{ asset('/') }}{{ $slider->slider_image }}" id="productImage" alt="Product Image" class="mt-2" width="170" height="100" style="border: 1px solid #bcbcbc;"/>
                        <span class="text-danger">{{ $errors->has('slider_image') ? $errors->first('slider_image') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Slider Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="slider_description" >{{ old('slider_description') != null ? old('slider_description') : $slider->slider_description }}</textarea>
                        <span class="text-danger">{{ $errors->has('slider_description') ? $errors->first('slider_description') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        @if(old('publication_status') == null)
                            <label class="mr-3"><input type="radio" name="publication_status" class="mr-1" value="1" {{ $slider->publication_status == 1 ? 'checked' : '' }}/>Published</label>
                            <label><input type="radio" name="publication_status" class="mr-1" value="0" {{ $slider->publication_status != 1  ? 'checked' : '' }}/>Unpublished</label>
                        @else
                            <label class="mr-3"><input type="radio" name="publication_status" class="mr-1" value="1" {{ old('publication_status') == 1 ? 'checked' : '' }}/>Published</label>
                            <label><input type="radio" name="publication_status" class="mr-1" value="0" {{ old('publication_status') != null && old('publication_status') != 1  ? 'checked' : '' }}/>Unpublished</label>
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