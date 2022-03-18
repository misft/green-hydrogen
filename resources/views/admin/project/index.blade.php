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
                        <x-action.create-button :route="route('project.create')" />
                        
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Country</th>
                                        <th>Region</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Website</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Total Budget</th>
                                        <th>Image</th>
                                        <th>Logo</th>
                                        <th>Member Of</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $item)
                                        <tr>
                                            <td>
                                                <h6>{{ $item->category->name }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->country->name }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->region->name }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->name }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->contact }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->website }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->email }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->city->name }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->total_budget }}</h6>
                                            </td>
                                            <td>
                                                <x-table.cell.image :src="$item->image"></x-table.cell.image>
                                            </td>
                                            <td>
                                                <x-table.cell.image :src="$item->logo"></x-table.cell.image>
                                            </td>
                                            <td>
                                                <x-table.cell.image :src="$item->member_of_image"></x-table.cell.image>
                                            </td>
                                            <td class="row">
                                                <x-action.external-link :route="$item->google_maps_url" label="Open Maps" />
                                                <x-action.delete-row :action="route('event.destroy', $item->id)" />
                                                <x-action.edit-row :route="route('event.edit', $item->id)" />
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
