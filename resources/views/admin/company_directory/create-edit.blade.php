@extends('layouts.master')
@section('title', 'Company Directory Management')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h2>Company Directory<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Forms</li>
<li class="breadcrumb-item active">Company Directory</li>
{{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <x-form.wizard>
            <x-slot name="header">
                {{ request()->routeIs('company_directory.create') ? 'Create Company Directory' : 'Update Company
                Directory' }}
            </x-slot>
            <form id="form"
                action="{{ request()->routeIs('company_directory.create') ? route('company_directory.store') : route('company_directory.update', ['company_directory' => $companyDirectory->id]) }}"
                class="theme-form mega-form" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.put-method />
                <x-form.text :value="@$companyDirectory->name" label="Name" name="name" />
                <x-form.text :value="@$companyDirectory->email" label="Email" name="email" />
                <x-form.text label="Password" name="password" password="1" value="" placeholder="ContohPass123" />
                <x-form.select :items="$region" label="Region" name="region_id" placeholder="Pilih Region"
                    :value="@$companyDirectory->region_id" />
                <x-form.text label="Website" name="website" :value="@$companyDirectory->website"
                    placeholder="https://foo.com" />
                <x-form.text label="Contact (Phone)" name="contact" :value="@$companyDirectory->contact"
                    placeholder="+62xxxxxx" />
                <x-form.wysiwyg :value="@$companyDirectory->description" label="Description" name="description" />
                <x-form.maps label="Location" :lat="@$companyDirectory->lat" :lng="@$companyDirectory->lng"
                    lat-name="lat" lng-name="lng" />
                <x-form.file name="photo" label="Image" />

            </form>
            <x-slot name="footer">
                <button form="form" class="btn btn-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-form.wizard>
    </div>
</div>
@endsection

@section('script')
<script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
<script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
@endsection
