@extends('layouts.master')
@section('title', 'Default Forms')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Default<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item">Form Layout</li>
    <li class="breadcrumb-item active">Default Forms</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('company.company_document.create') ? 'Create Document' : 'Update Document' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('company.company_document.create') ? route('company.company_document.store'): route('company.company_document.update', $companyDocument->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="company_directory_id" value="{{ Auth::guard('company')->user()->id }}">
                    <x-form.put-method  />
                    <x-form.select :items="$companyDocumentCategories" placeholder="Pilih Document Category" name="company_document_category_id" label="Document Category" :value="@$companyDocument->company_document_category_id"></x-form.select>
                    <x-form.text :value="@$companyDocument->title" label="Title" name="title" />
                    <x-form.textarea :value="@$companyDocument->description" label="Description" name="description" />
                        <x-form.file name="documents[]" multiples label="File" />
                </form>
                <x-slot name="footer">
                    <button form="form" class="btn btn-primary btn-pill">Submit</button>
                    <button form="form" class="btn btn-secondary btn-pill">Cancel</button>
                </x-slot>
            </x-form.wizard>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
@endsection
