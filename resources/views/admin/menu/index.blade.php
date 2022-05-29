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
    <h2>Menu<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Menu</li>
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
                        <div class="row justify-content-between">
                            <x-action.create-button :route="route('menu.create')"></x-action.create-button>
                            <div class="mb-4"><a href="{{route('menu.lock')}}" class="btn btn-{{ $lockmenu == 1 ? 'danger' : 'primary' }} btn-md btn-pill">{{ $lockmenu == 1 ? 'Enable Menu' : 'Disable Menu'}}</a></div>
                        </div>
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Menu Parent</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>
                                                <h6>
                                                    @foreach($menu->translation as $item)
                                                        <span class="text-info">[{{ $item->language }}]</span>
                                                        {{ $item->name }} <br>
                                                    @endforeach
                                                </h6>
                                            </td>
                                            <td>
                                                <x-table.cell.basic :item="$menu" key="order"/>
                                            </td>
                                            <td>
                                                <h6>
                                                    @if($menu->parent == 0 )
                                                        {{ __('Main Menu')}}
                                                    @else
                                                        {{ $parent[$menu->parent] }}
                                                    @endif
                                                </h6>
                                            </td>
                                            <td>
                                                <x-table.cell.basic :item="$menu" key="link"/>
                                            </td>
                                            <td>
                                                <x-action.delete-row :disable="$lockmenu" :idform="$menu->id" :action="route('menu.destroy', $menu->id)" />
                                                <x-action.edit-row :disable="$lockmenu" :route="route('menu.edit', $menu->id)" />
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
