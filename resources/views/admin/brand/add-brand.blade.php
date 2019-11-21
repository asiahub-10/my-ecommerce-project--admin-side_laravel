@extends('admin.master')

@section('title')
    Add Brand
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

        <div class="card mt-5 col-lg-7 col-md-10 mx-auto px-0">
            <div class="card-header bg-gradient-info">
                <h3 class="text-center text-light font-weight-bold font-italic">Add Brand</h3>
            </div>
            <div class="card-body col-sm-12">
                {{ Form::open(['route'=>'save-brand', 'method'=>'post', 'class'=>'form-horizontal']) }}
                <div class="form-group row">
                    <label class="col-md-3">Brand Name</label>
                    <div class="col-md-9">
                        <input type="text" name="brand_name" class="form-control" value="{{ old('brand_name') }}"/>
                        <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Brand Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="brand_description" >{{ old('brand_description') }}</textarea>
                        <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        <label class="mr-3"><input type="radio" name="publication_status" class="mr-1" value="1" {{ old('publication_status') == 1  ? 'checked' : '' }}/>Published</label>
                        <label><input type="radio" name="publication_status" class="mr-1" value="0" {{ old('publication_status') !=null && old('publication_status') != 1  ? 'checked' : '' }}/>Unpublished</label>
                        <br/>
                        <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-md-3"></label>
                    <div class="col-md-9">
                        <input type="submit" name="btn" class="btn btn-outline-info font-weight-bold btn-block form-control" value="Save Brand Info"/>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection