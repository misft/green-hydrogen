@extends('layouts.master')
@section('title', 'Company Directory')

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
                    {{ request()->routeIs('company_document_category.create') ? 'Create Category' : 'Update Category' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('company_document_category.create') ? route('company_document_category.store'): route('company_document_category.update', @$companyDirectoryCategory->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.text :value="@$companyDirectoryCategory->name" label="Category" name="name" />
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
