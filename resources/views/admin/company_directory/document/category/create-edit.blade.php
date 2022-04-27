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
                    action="{{ request()->routeIs('company_document_category.create') ? route('company_document_category.store'): route('company_document_category.update', $companyDocumentCategory->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <x-form.put-method  />
                    <div class="mb-2">
                        <div class="col-form-label"><span class="text-info">[id]</span>Name<span class="text-danger">*</span></div>
                        <input type="text" name="name_id" placeholder="Input name in Bahasa" value="{{ @json_decode($companyDocumentCategory->name)[0]->name ?? @$companyDocumentCategory->name }}" class="form-control"/>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label"><span class="text-info">[en]</span>Name<span class="text-danger">*</span></div>
                        <input type="text" name="name_en" placeholder="Input name in English" value="{{ @json_decode($companyDocumentCategory->name)[1]->name ?? @$companyDocumentCategory->name }}" class="form-control"/>
                    </div>
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
