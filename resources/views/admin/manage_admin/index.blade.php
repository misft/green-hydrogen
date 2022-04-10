@extends('layouts.master')
@section('title', 'Green Hydrogen')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/prism.css">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/chartist.css">
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/date-picker.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h2>Admin<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Admin</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-sm-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>Individual column searching (text inputs) </h5>
                    <span>The searching functionality provided by DataTables is useful for quickly search through the
                        information in the table - however the search is global, and you may wish to present controls
                        that search on specific columns.</span>
                </div> --}}
                <div class="card-body">
                    <x-action.create-button :route="route('manage_admin.create')" />

                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Scopes</th>
                                    <th>Tanggal Registrasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->scopes ?? ''}}</td>
                                    <td>{{date("d-m-Y", strtotime($item->created_at))}}</td>
                                    <td>
                                        <x-action.delete-row :action="route('manage_admin.destroy', $item->id)" />
                                        <x-action.edit-row :route="route('manage_admin.edit', $item->id)" />
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
