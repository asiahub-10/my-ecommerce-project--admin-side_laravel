@extends('admin.master')

@section('title')
    Edit Category
@endsection

@section('body')

    <div class="container">

        <div class="card mt-5 col-lg-7 col-md-10 mx-auto px-0">
            <div class="card-header bg-gradient-info">
                <h3 class="text-center text-light font-weight-bold font-italic">Edit Category</h3>
            </div>
            <div class="card-body col-sm-12">
                {{ Form::open(['route'=>'update-category', 'method'=>'post', 'class'=>'form-horizontal']) }}
                <div class="form-group row">
                    <label class="col-md-3">Category Name</label>
                    <div class="col-md-9">
                        <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}"/>
                        <input type="hidden" name="category_id" class="form-control" value="{{ $category->id }}"/>
                        <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Category Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="category_description" >{{ $category->category_description }}</textarea>
                        <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        @if($category->publication_status == 1 )
                        <label class="mr-3"><input type="radio" checked name="publication_status" class="mr-1" value="1"/>Published</label>
                        <label><input type="radio" name="publication_status" class="mr-1" value="0"/>Unpublished</label>
                        @else
                        <label class="mr-3"><input type="radio" name="publication_status" class="mr-1" value="1"/>Published</label>
                        <label><input type="radio" name="publication_status" checked class="mr-1" value="0"/>Unpublished</label>
                        @endif
                        <br/>
                        <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-md-3"></label>
                    <div class="col-md-9">
                        <input type="submit" name="btn" class="btn btn-outline-info font-weight-bold btn-block form-control" value="Update Category Info"/>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection