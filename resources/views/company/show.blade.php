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
    <h2>Company<span> Management</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Company</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Profile --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form id="form-profile" action="{{ route('company.company_directory.update', $company->id) }}" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="">Logo Company</label>
                            </div>
                            <div class="col-auto mb-2">
                                <img class="img-thumbnail" src="{{ asset('storage/'.$company->image) }}" width="200" height="200" alt="">
                            </div>
                            @if(!isset($company->image))
                                <div class="col-auto">
                                    <label for="" class="f-8 text-danger">Please insert your logo here</label>
                                </div>
                            @endif
                            <div class="col-auto">
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="">Photo Company</label>
                            </div>
                            <div class="col-auto mb-2">
                                <img class="img-thumbnail" src="{{ asset('storage/'.$company->photo) }}" width="200" height="200" alt="">
                            </div>
                            <div class="col-auto">
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="col-12">

                                    @csrf
                                    @method('put')
                                    <x-form.text label="Name" name="name" :value="$company->email" placeholder=""/>
                                    <x-form.textarea label="Description" name="description" :value="$company->description" placeholder=""/>
                                    <x-form.select :items="$regions" label="Region" name="region_id" :value="$company->region_id"/>
                                    <x-form.text label="Address" name="address" :value="$company->address" placeholder="Jl. Gas Energy"/>
                                    <x-form.maps label="Location" :lat="$company->lat" :lng="$company->lng" lat-name="lat" lng-name="lng"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button form="form-profile" type="submit" class="btn btn-info">Save</button>
                    </div>
                </div>
            </div>
            {{-- Contact --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>Contact Information</h5>
                            </div>
                            <div class="card-body">
                                <form id="form-action" action="{{ route('company.company_directory.update', $company->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">CP Name</label>
                                                <input type="text" name="contact_person" value="{{ $company->contact_person }}" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="text" name="phone" value="{{ $company->contact }}" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Website</label>
                                        <input type="text" name="website" value="{{ $company->website }}" class="form-control" id="">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button form="form-action" type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Login</h5>
                            </div>
                            <div class="card-body">
                                <form id="form-login" action="{{ route('company.company_directory.update', $company->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <x-form.text label="E-mail" name="email" :value="$company->email" placeholder=""/>
                                    <x-form.text label="Password" name="password" value="" placeholder="" password="true"/>
                                    <x-form.text label="Confirm Password" name="confirm_password" value="" placeholder="" :password="true"/>
                                    <x-form.text label="Current Password" name="current_password" value="" placeholder="" :password="true"/>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button form="form-login" type="submit" class="btn btn-info">Save</button>
                            </div>
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
