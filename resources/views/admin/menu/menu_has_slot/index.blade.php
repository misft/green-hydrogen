@extends('layouts.master')
@section('title', 'Premium Admin Template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/prism.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/date-picker.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Menu<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Default</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Individual column searching (text inputs) </h5>
                        <span>The searching functionality provided by DataTables is useful for quickly search through the
                            information in the table - however the search is global, and you may wish to present controls
                            that search on specific columns.</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Slot</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>
                                                <x-table.cell.language :items="$item->menu" key="name" />
                                            </td>
                                            <td>
                                                <h6>{{ $item->slot->name }}</h6>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Delete</button>
                                                <button class="btn btn-success btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ route('/') }}/assets/js/owlcarousel/owl.carousel.js"></script>
    <script src="{{ route('/') }}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ route('/') }}/assets/js/rating/jquery.barrating.js"></script>
    <script src="{{ route('/') }}/assets/js/rating/rating-script.js"></script>
    <script src="{{ route('/') }}/assets/js/ecommerce.js"></script>
    <script src="{{ route('/') }}/assets/js/product-list-custom.js"></script>
@endsection
