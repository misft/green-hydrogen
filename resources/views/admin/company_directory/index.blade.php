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
<h2>Company Directory<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Company Directory</li>
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
                    <x-action.create-button :route="route('company_directory.create')" />
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Region</th>
                                    <th>Contact</th>
                                    <th>E-mail</th>
                                    <th>Photo</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companyDirectories as $company)
                                <tr>
                                    <td>
                                        <h6>{{ $company->name }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $company->region->name }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $company->contact }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $company->email }}</h6>
                                    </td>
                                    <td>
                                        <img tyle="max-width: 200px;" class="rounded"
                                            src="{{ asset('storage/'.$company->photo) }}" alt="">
                                    </td>
                                    <td>
                                        <h6>{{ $company->website }}</h6>
                                    </td>
                                    <td>
                                        <x-action.delete-row
                                            :action="route('company_directory.destroy', $company->id)" />
                                        <x-action.edit-row :route="route('company_directory.edit', $company->id)" />
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
