@extends('layouts.master')
@section('title', 'Sponsor Management')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/prism.css">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/chartist.css">
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/date-picker.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h2>Sponsor<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Sponsor</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>Individual column searching (text inputs) </h5>
                    <span>The searching functionality provided by DataTables is useful for quickly search through the
                        information in the table - however the search is global, and you may wish to present controls
                        that search on specific columns.</span>
                </div> --}}
                <div class="card-body">
                    <x-action.create-button :route="route('sponsor.create')" />
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>Group</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sponsor as $each)
                                <tr>
                                    <td>
                                        <h6>{{ $each->name }}</h6>
                                    </td>
                                    <td>
                                        <img style="width: 200px;" class="rounded"
                                            src="{{ asset('storage/'.$each->image) }}" alt="">
                                    </td>
                                    <td>
                                        <h6 class="text-wrap">{{ $each->link }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $each->group->name }}</h6>
                                    </td>
                                    <td>
                                        <x-action.delete-row :idform="$each->id"
                                            :action="route('sponsor.destroy', $each->id)" />
                                        <x-action.edit-row :route="route('sponsor.edit', $each->id)" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
