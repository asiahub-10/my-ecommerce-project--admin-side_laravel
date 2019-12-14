@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')

    <div class="container">
        <style>
            .success {
                border-radius: 50%;
                border: 2px solid #d6d8db;
            }
        </style>
        @if(Session::has('message'))
            <div class="card-body text-center pb-0 alert">
                <button type="button" class="close text-danger" data-dismiss="alert">x</button>
                <i class="fas fa-2x fa-check text-info p-2 success"></i>
                <h4 class="text-info font-weight-bold ">{{ Session::get('message') }}</h4>
            </div>
        @endif


        <div class="mt-3 col-sm-12 mx-auto px-0">
            <div class="table-responsive text-center">
                <table class="table table-striped table-bordered table-light table-hover">
                    <thead class="bg-gradient-info text-light">
                        <tr>
                            <th>SL No.</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($categories as $category)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $category->category_name }}</th>
                            <th>{{ $category->category_description }}</th>
                            {{--<th>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</th>--}}
                            <th>
                                @if($category->publication_status == 1)
                                <p class="text-success">Published</p>
                                @else
                                <p class="text-warning">Unpublished</p>
                                @endif
                            </th>
                            <th class="custom-control-inline">
                                <a href="{{ route('edit-category', ['id'=>$category->id]) }}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                @if($category->publication_status == 0)
                                <a href="#" onclick="
                                event.preventDefault();
                                var check = confirm('Are you sure to publish this category ???');
                                if (check) {
                                    document.getElementById('publishCategoryForm'+'{{ $category->id }}').submit();
                                }
                                " class="btn btn-success mx-1" title="Publish"><i class="fas fa-cloud-upload-alt"></i></a>
                                    <form id="publishCategoryForm{{ $category->id }}" action="{{ route('publish-category') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $category->id }}" name="id"/>
                                    </form>
                                @else
                                <a href="#" onclick="
                                event.preventDefault();
                                var check = confirm('Are you sure to unpublish this category ???');
                                if (check) {
                                    document.getElementById('unpublishCategoryForm'+'{{ $category->id }}').submit();
                                }
                                " class="btn btn-warning mx-1" title="Unpublish"><i class="fas fa-cloud-download-alt"></i></a>
                                    <form id="unpublishCategoryForm{{ $category->id }}" action="{{ route('unpublish-category') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $category->id }}" name="id"/>
                                    </form>
                                @endif

                                <a href="#" onclick="
                                event.preventDefault();
                                var check = confirm('Are you sure to delete this category ???');
                                if (check) {
                                    document.getElementById('deleteCategoryForm'+'{{ $category->id }}').submit();
                                }
                                " class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i>

                                </a>
                                <form id="deleteCategoryForm{{ $category->id }}" action="{{ route('delete-category') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $category->id }}" name="id"/>
                                </form>
                                {{--{{ Form::open(['route'=>'delete-category', 'method'=>'post', 'id'=>'deleteCategoryForm.{!! $category->id !!}']) }}--}}
                                {{--<input type="hidden" value="{{ $category->id }}" name="id"/>--}}
                                {{--{{ Form::close() }}--}}
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                        <tr>
                            <th>SL No.</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection