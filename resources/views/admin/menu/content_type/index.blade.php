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
            <x-page.grid :headers="['Name']" :create-route="route('content_type.create')">
                <x-slot name="title">
                    Content Type
                </x-slot>
                <x-slot name="description">
                    Content Type Management
                </x-slot>
                <x-slot name="data">
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            <h6>{{ $item->name }}</h6>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-xs" type="button"
                                data-original-title="btn btn-danger btn-xs" title="">Delete</button>
                            <button class="btn btn-success btn-xs" type="button"
                                data-original-title="btn btn-danger btn-xs" title="">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </x-slot>
            </x-page.grid>
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
