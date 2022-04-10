@extends('layouts.master')
@section('title', 'Content Type Menu')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/prism.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/date-picker.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Content Type Menu<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Menu</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <x-page.grid :headers="['Name']" :createRoute="route('content_type.create')">
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
                            <x-action.delete-row :action="route('content_type.destroy', $item->id)" />
                            <x-action.edit-row :route="route('content_type.edit', $item->id)" />
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
