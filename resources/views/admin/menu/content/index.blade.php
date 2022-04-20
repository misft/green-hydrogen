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
    <h2>Content<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Content</li>
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
                        <x-action.create-button :route="route('content.create')"></x-action.create-button>
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Slot</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Position</th>
                                        <th>Level</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $content)
                                        <tr>
                                            <td>
                                                <h6>
                                                    {{ $content->spot->name }}
                                                </h6>
                                            </td>
                                            <td>
                                                <x-table.cell.basic :item="$content" key="name"/>
                                            </td>
                                            <td>
                                                <x-table.cell.basic :item="$content" key="types"/>
                                            </td>
                                            <td>
                                                <x-table.cell.basic :item="$content" key="positions"/>
                                            </td>
                                            <td>
                                                <x-table.cell.basic :item="$content" key="order"/>
                                            </td>
                                            <td>
                                                <h6>
                                                    @foreach($content->translation as $item)
                                                        @if($content->name === "link" || $content->name === "button_link")
                                                            {{ $item->content }}
                                                            @break
                                                        @elseif($content->name === "picture" || $content->name === "video" || $content->name === "video_link")
                                                            @if($content->name === "video_link")
                                                                <a href="{{ $item->content }}" target="_blank">View</a>
                                                            @else
                                                                <a href="{{ asset('storage/'.$item->content) }}" target="_blank">View</a>
                                                            @endif
                                                            @break
                                                        @else
                                                            <span class="text-info">[{{ $item->language }}]</span>
                                                            {{ $item->content }} <br>
                                                        @endif
                                                    @endforeach
                                                </h6>
                                            </td>
                                            <td>
                                                <x-action.delete-row :idform="$content->id" :action="route('content.destroy', $content->id)" />
                                                <x-action.edit-row :route="route('content.edit', $content->id)" />
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
