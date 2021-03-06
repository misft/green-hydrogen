@extends('layouts.master')
@section('title', 'Activity Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/prism.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/date-picker.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Activity<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Activity</li>
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
                        {{-- <button type="button" class="btn btn-primary mb-2">
                            Category Terpilih di Publish : <span class="badge badge-light">{{ $category ?? 'Belum Dipilih' }}</span>
                          </button> --}}
                          <x-action.create-button :route="route('activity_category.create')" />
                        {{-- <div class="row justify-content-between">
                            <div class="col-6">
                                <x-action.create-button :route="route('activity_category.create')" />
                            </div>
                            <div class="col align-self-end">
                                <button class="btn btn-outline-success ">Published Category : {{ $category ?? 'Belum Dipilih' }}</button>
                            </div>
                        </div> --}}

                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        {{-- <th>Title</th>
                                        <th>Description</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activityCategory as $item)
                                        <tr>
                                            <td>
                                                <x-table.cell.language :items="$item" key="name" />
                                            </td>
                                            <td>
                                                {{-- <x-action.default-button :action="route('setting.store')" :value="$item->id" params="NEWSCAT" idform="itemdefault{{$item->id}}"/> --}}
                                                <x-action.delete-row :idform="$item->id" :action="route('activity_category.destroy', $item->id)" />
                                                    <x-action.edit-row :idform="$item->id" :route="route('activity_category.edit', $item->id)" />
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
