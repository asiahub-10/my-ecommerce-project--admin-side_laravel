@extends('admin.master')

@section('title')
    Home
@endsection()

@section('body')
    <div class="container my-4">
        <h4 class="text-info text-uppercase">Dashboard</h4>
        <hr/>
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <p class="text-center text-info"><i class="fas fa-2x fa-tshirt"></i></p>
                        <h5 class="text-uppercase text-center text-info">Product</h5>
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right">{{ count($product) }}</td>
                                </tr>
                                <tr>
                                    <th>Published</th>
                                    <td class="text-right text-success">{{ count($productPublish) }}</td>
                                </tr>
                                <tr>
                                    <th>Unpublished</th>
                                    <td class="text-right text-warning">{{ count($productUnpublish) }}</td>
                                </tr>
                                <tr>
                                    <th>Have Enough Merchandise</th>
                                    <td class="text-right text-success">{{ count($productQtyHigh) }}</td>
                                </tr>
                                <tr>
                                    <th>Have Very Few Merchandise</th>
                                    <td class="text-right text-warning">{{ count($productQtyMedium) }}</td>
                                </tr>
                                <tr>
                                    <th>Have Zero Merchandise</th>
                                    <td class="text-right text-danger">{{ count($productQtyLow) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <p class="text-center text-info"><i class="far fa-2x fa-calendar-check"></i></p>
                        <h5 class="text-uppercase text-center text-info">Order</h5>
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right">{{ count($order) }}</td>
                                </tr>
                                <tr>
                                    <th>Delivered</th>
                                    <td class="text-right text-success">{{ count($orderDelivered) }}</td>
                                </tr>
                                <tr>
                                    <th>Pending</th>
                                    <td class="text-right text-warning">{{ count($orderPending) }}</td>
                                </tr>
                                <tr>
                                    <th>Cancelled</th>
                                    <td class="text-right text-danger">{{ count($orderCancelled) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <p class="text-center text-info"><i class="fas fa-2x fa-money-bill-wave"></i></p>
                        <h5 class="text-uppercase text-center text-info">Payment</h5>
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Paid</th>
                                    <td class="text-right text-success">{{ count($paymentPending) }}</td>
                                </tr>
                                <tr>
                                    <th>Pending</th>
                                    <td class="text-right text-warning">{{ count($paymentPaid) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <p class="text-center text-info"><i class="fas fa-2x fa-sitemap"></i></p>
                        <h5 class="text-uppercase text-center text-info">Category</h5>
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right">{{ count($category) }}</td>
                                </tr>
                                <tr>
                                    <th>Published</th>
                                    <td class="text-right text-success">{{ count($categoryPublish) }}</td>
                                </tr>
                                <tr>
                                    <th>Unpublished</th>
                                    <td class="text-right text-warning">{{ count($categoryUnpublish) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <p class="text-center text-info"><i class="fas fa-2x fa-award"></i></p>
                        <h5 class="text-uppercase text-center text-info">Brand</h5>
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right">{{ count($brand) }}</td>
                                </tr>
                                <tr>
                                    <th>Published</th>
                                    <td class="text-right text-success">{{ count($brandPublish) }}</td>
                                </tr>
                                <tr>
                                    <th>Unpublished</th>
                                    <td class="text-right text-warning">{{ count($brandUnpublish) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <p class="text-center text-info"><i class="fab fa-2x fa-slideshare"></i></p>
                        <h5 class="text-uppercase text-center text-info">Slider</h5>
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right">{{ count($slide) }}</td>
                                </tr>
                                <tr>
                                    <th>Published</th>
                                    <td class="text-right text-success">{{ count($slidePublish) }}</td>
                                </tr>
                                <tr>
                                    <th>Unpublished</th>
                                    <td class="text-right text-warning">{{ count($slideUnpublish) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <p class="text-center text-info"><i class="fas fa-2x fa-user-shield"></i></p>
                        <h5 class="text-uppercase text-center text-info">User (Back-End)</h5>
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right">{{ count($user) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-0">
                        <p class="text-center text-info"><i class="fas fa-2x fa-users"></i></p>
                        <h5 class="text-uppercase text-center text-info">Customer</h5>
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right">{{ count($customer) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()