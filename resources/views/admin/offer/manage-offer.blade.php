@extends('admin.master')

@section('title')
    Manage Offer
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
                        <th>Offer Title</th>
                        <th>Offer Image</th>
                        <th>Offer Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($offers as $offer)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $offer->offer_title }}</th>
                            <th>
                                <img src="{{ asset('/') }}{{ $offer->offer_image }}" alt="offer Image" width="120" height="70"/>
                            </th>
                            <th>{!! $offer->offer_description !!}</th>
                            <th>
                                @if($offer->publication_status == 1)
                                    <p class="text-success">Published</p>
                                @else
                                    <p class="text-warning">Unpublished</p>
                                @endif
                            </th>
                            <th class="custom-control-inline border-0">
                                <a href="{{ route('edit-offer-info', ['id'=>$offer->id]) }}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                @if($offer->publication_status != 1)
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to publish this offer ???');
                                            if (check) {
                                            document.getElementById('publishOfferForm'+'{{ $offer->id }}').submit();
                                            }
                                            " class="btn btn-success mx-1" title="Publish"><i class="fas fa-cloud-upload-alt"></i></a>
                                    <form id="publishOfferForm{{ $offer->id }}" action="{{ route('publish-offer') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $offer->id }}" name="id"/>
                                    </form>

                                @else
                                    <a href="#" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure to unpublish this offer ???');
                                            if (check) {
                                            document.getElementById('unpublishOfferForm'+'{{ $offer->id }}').submit();
                                            }
                                            " class="btn btn-warning mx-1" title="Unpublish"><i class="fas fa-cloud-download-alt"></i></a>
                                    <form id="unpublishOfferForm{{ $offer->id }}" action="{{ route('unpublish-offer') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $offer->id }}" name="id"/>
                                    </form>
                                @endif

                                <a href="#" onclick="
                                        event.preventDefault();
                                        var check = confirm('Are you sure to delete this offer ???');
                                        if (check) {
                                        document.getElementById('deleteOfferForm'+'{{ $offer->id }}').submit();
                                        }
                                        " class="btn btn-danger" title="Delete"><i class="fas fa-trash-alt"></i>

                                </a>
                                <form id="deleteOfferForm{{ $offer->id }}" action="{{ route('delete-offer-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $offer->id }}" name="id"/>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                    <tr>
                        <th>SL No.</th>
                        <th>Offer Title</th>
                        <th>Offer Image</th>
                        <th>Offer Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection