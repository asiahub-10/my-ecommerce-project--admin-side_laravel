@extends('admin.master')

@section('title')
    Manage Customer Review
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
                        <th>Date</th>
                        <th>Product Name</th>
                        <th>Customer Name</th>
                        <th>Customer Review</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <th>{{ $review->created_at->format('jS M, Y') }}</th>
{{--                            <th>{{ $review->created_at->format('l jS \\of F Y') }}</th>--}}
                            <th>{{ $review->product->product_name }}</th>
                            <th>{{ $review->customer->first_name }} {{ $review->customer->last_name }}</th>
                            <th>{{ $review->review }}</th>
                            <th>
                                @if($review->publication_status == 1)
                                    <p class="text-success">Published</p>
                                @else
                                    <p class="text-warning">Unpublished</p>
                                @endif
                            </th>
                            <th class="custom-control-inline">
                                {{--<a href="{{ route('edit-review', ['id'=>$review->id]) }}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>--}}
                                @if($review->publication_status == 1)
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to unpublish this review ???');
                                            if (check) {
                                            document.getElementById('unpublishReviewForm{{ $review->id }}').submit();
                                            }
                                            " class="btn btn-warning mx-1" title="Unpublish"><i class="fas fa-cloud-download-alt"></i></a>
                                    <form id="unpublishReviewForm{{ $review->id }}" action="{{ route('unpublish-review') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $review->id }}" name="id"/>
                                    </form>
                                @else
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to publish this review ???');
                                            if (check) {
                                            document.getElementById('publishReviewForm'+'{{ $review->id }}').submit();
                                            }
                                            " class="btn btn-success mx-1" title="Publish"><i class="fas fa-cloud-upload-alt"></i></a>
                                    <form id="publishReviewForm{{ $review->id }}" action="{{ route('publish-review') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $review->id }}" name="id"/>
                                    </form>
                                @endif

                                <a href="#" onclick="
                                        event.preventDefault();
                                        var check = confirm('Are you sure to delete this review ???');
                                        if (check) {
                                        document.getElementById('deleteReviewForm'+'{{ $review->id }}').submit();
                                        }
                                        " class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i>
                                </a>
                                <form id="deleteReviewForm{{ $review->id }}" action="{{ route('delete-review') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $review->id }}" name="id"/>
                                </form>

                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                    <tr>
                        <th>Date</th>
                        <th>Product Name</th>
                        <th>Customer Name</th>
                        <th>Customer Review</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection