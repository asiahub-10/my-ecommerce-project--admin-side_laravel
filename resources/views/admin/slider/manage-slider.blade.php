@extends('admin.master')

@section('title')
    Manage Slider
@endsection

@section('body')

    <div class="container">
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
                        <th>Slider Title</th>
                        <th>Slider Image</th>
                        <th>Slider Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($sliders as $slider)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $slider->slider_title }}</th>
                            <th>
                                <img src="{{ asset('/') }}{{ $slider->slider_image }}" alt="Slider Image" width="120" height="70"/>
                            </th>
                            <th>{{ $slider->slider_description }}</th>
                            <th>
                                @if($slider->publication_status == 1)
                                    <p class="text-success">Published</p>
                                @else
                                    <p class="text-warning">Unpublished</p>
                                @endif
                            </th>
                            <th class="custom-control-inline border-0">
                                <a href="{{ route('edit-slider', ['id'=>$slider->id]) }}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                @if($slider->publication_status == 0)
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to publish this slider ???');
                                            if (check) {
                                            document.getElementById('publishSliderForm'+'{{ $slider->id }}').submit();
                                            }
                                            " class="btn btn-success mx-1" title="Publish"><i class="fas fa-cloud-upload-alt"></i></a>
                                    <form id="publishSliderForm{{ $slider->id }}" action="{{ route('publish-slider') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $slider->id }}" name="id"/>
                                    </form>

                                @else
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to unpublish this slider ???');
                                            if (check) {
                                            document.getElementById('unpublishSliderForm'+'{{ $slider->id }}').submit();
                                            }
                                            " class="btn btn-warning mx-1" title="Unpublish"><i class="fas fa-cloud-download-alt"></i></a>
                                    <form id="unpublishSliderForm{{ $slider->id }}" action="{{ route('unpublish-slider') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $slider->id }}" name="id"/>
                                    </form>
                                @endif

                                <a href="#" onclick="
                                        event.preventDefault();
                                        var check = confirm('Are you sure to delete this slider ???');
                                        if (check) {
                                        document.getElementById('deleteSliderForm'+'{{ $slider->id }}').submit();
                                        }
                                        " class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i>

                                </a>
                                <form id="deleteSliderForm{{ $slider->id }}" action="{{ route('delete-slider') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $slider->id }}" name="id"/>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                    <tr>
                        <th>SL No.</th>
                        <th>Slider Title</th>
                        <th>Slider Image</th>
                        <th>Slider Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection