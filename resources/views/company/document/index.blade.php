@extends('layouts.master')
@section('title', 'Company Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/prism.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/date-picker.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Company<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Company</li>
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
                        <x-action.create-button :route="route('company.company_document.create')" />

                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Cover Image</th>
                                        <th>Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $item)
                                        <tr>
                                        <td>
                                                @if(is_array(json_decode($item->category->name)))
                                                    @foreach (json_decode($item->category->name) as $cat)
                                                        <h6>
                                                            <span class="text-info">[{{ $cat->language }}]</span>
                                                            {{ $cat->name }}
                                                        </h6>
                                                    @endforeach
                                                @else 
                                                    <h6>
                                                        <span class="text-danger">Masih menggunakan format data lama, silahkan diupdate</span>
                                                    </h6>
                                                @endif
                                            </td>
                                            <td>
                                                @if(is_array(json_decode($item->title)))
                                                    @foreach (json_decode($item->title) as $title)
                                                        <h6>
                                                            <span class="text-info">[{{ $title->language }}]</span>
                                                            {{ $title->title }}
                                                        </h6>
                                                    @endforeach
                                                @else 
                                                    <h6>
                                                        <span class="text-danger">Masih menggunakan format data lama, silahkan diupdate</span>
                                                    </h6>
                                                @endif
                                            </td>
                                            <td>
                                                @if(is_array(json_decode($item->description)))
                                                    @foreach (json_decode($item->description) as $description)
                                                        <h6>
                                                            <span class="text-info">[{{ $description->language }}]</span>
                                                            {{ $description->description }}
                                                        </h6>
                                                    @endforeach
                                                @else 
                                                    <h6>
                                                        <span class="text-danger">Masih menggunakan format data lama, silahkan diupdate</span>
                                                    </h6>
                                                @endif
                                            </td>
                                            <td>
                                                <h6>
                                                    <a href="{{ asset('storage/'.json_decode($item->cover)[0]) }}" target="_blank" rel="noopener noreferrer">View</a>
                                                </h6>
                                            </td>
                                            <td>
                                                <h6>
                                                    <a href="{{ asset('storage/'.json_decode($item->documents)[0]) }}" target="_blank" rel="noopener noreferrer">View</a>
                                                </h6>
                                            </td>
                                            <td>
                                                <x-action.delete-row :idform="$item->id" :action="route('company.company_document.destroy', $item->id)" />
                                                <x-action.edit-row :route="route('company.company_document.edit', $item->id)" />
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
