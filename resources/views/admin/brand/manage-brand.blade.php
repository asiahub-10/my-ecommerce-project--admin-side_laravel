@extends('admin.master')

@section('title')
    Manage brand
@endsection

@section('body')

    <div class="container mt-4 mb-5">
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
                        <th>brand Name</th>
                        <th>brand Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($brands as $brand)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $brand->brand_name }}</th>
                            <th>{{ $brand->brand_description }}</th>
                            <th>
                                @if($brand->publication_status == 1)
                                    <p class="text-success">Published</p>
                                @else
                                    <p class="text-warning">Unpublished</p>
                                @endif
                            </th>
                            <th class="custom-control-inline">
                                <a href="{{ route('edit-brand', ['id'=>$brand->id]) }}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                @if($brand->publication_status == 0)
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to publish this brand ???');
                                            if (check) {
                                            document.getElementById('publishbrandForm'+'{{ $brand->id }}').submit();
                                            }
                                            " class="btn btn-success mx-1" title="Publish"><i class="fas fa-cloud-upload-alt"></i></a>
                                    <form id="publishbrandForm{{ $brand->id }}" action="{{ route('publish-brand') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $brand->id }}" name="id"/>
                                    </form>
                                @else
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to unpublish this brand ???');
                                            if (check) {
                                            document.getElementById('unpublishbrandForm'+'{{ $brand->id }}').submit();
                                            }
                                            " class="btn btn-warning mx-1" title="Unpublish"><i class="fas fa-cloud-download-alt"></i></a>
                                    <form id="unpublishbrandForm{{ $brand->id }}" action="{{ route('unpublish-brand') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $brand->id }}" name="id"/>
                                    </form>
                                @endif

                                <a href="#" onclick="
                                        event.preventDefault();
                                        var check = confirm('Are you sure to delete this brand ???');
                                        if (check) {
                                        document.getElementById('deletebrandForm'+'{{ $brand->id }}').submit();
                                        }
                                        " class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i>

                                </a>
                                <form id="deletebrandForm{{ $brand->id }}" action="{{ route('delete-brand') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $brand->id }}" name="id"/>
                                </form>
                                {{--{{ Form::open(['route'=>'delete-brand', 'method'=>'post', 'id'=>'deletebrandForm.{!! $brand->id !!}']) }}--}}
                                {{--<input type="hidden" value="{{ $brand->id }}" name="id"/>--}}
                                {{--{{ Form::close() }}--}}
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                    <tr>
                        <th>SL No.</th>
                        <th>brand Name</th>
                        <th>brand Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection