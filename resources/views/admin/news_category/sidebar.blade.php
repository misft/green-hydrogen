@extends('layouts.master')
@section('title', 'News Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/prism.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/date-picker.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>News<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">News</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                  <button class="btn shadow text-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Headline News Category [Sidebar Atas] : {{ $categorySA }}
                                  </button>
                                </h5>
                              </div>

                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                  <form action="{{route('setting.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="params" value="NEWSCATSA">
                                    <div class="mb-2">
                                    <div class="col-form-label text-muted">Category</div>
                                    <select class="form-control" data-placeholder="Select Category" name="value">
                                        @foreach ($newsCategory as $id => $name)
                                            <option value="{{ $name->translation->id }}" @if (@$settSA == $name->translation->id) selected @endif>{{ $name->translation->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Pilih</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                  <button class="btn shadow text-primary collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Headline News Category [Sidebar Bawah] : {{ $categorySB }}
                                  </button>
                                </h5>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="{{route('setting.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="params" value="NEWSCATSB">
                                    <div class="mb-2">
                                        <div class="col-form-label text-muted">Category</div>
                                        <select class="form-control" data-placeholder="Select Category" name="value">
                                            @foreach ($newsCategory as $id => $name)
                                                <option value="{{ $name->translation->id }}" @if (@$settSB == $name->translation->id) selected @endif>{{ $name->translation->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Pilih</button>
                                    </form>

                                </div>
                              </div>
                            </div>
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
