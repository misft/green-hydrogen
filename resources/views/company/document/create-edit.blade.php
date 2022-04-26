@extends('layouts.master')
@section('title', 'Company Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Company Document<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Company Document</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
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
                    <x-form.put-method  /><div class="mb-2">
                        <div class="col-form-label text-muted">{{ __('Document Category') }}</div>
                        <select class="form-control" name="company_document_category_id">
                            @foreach ($companyDocumentCategories as $id => $name)
                                <option value="{{ $id }}" @if (@$companyDocument->company_document_category_id == $id) selected @endif>{{ is_array($name) ? json_decode($name)[0]->name.' / '.json_decode($name)[1]->name : $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label"><span class="text-info">[id]</span>Title<span class="text-danger">*</span></div>
                        <input type="text" name="title_id" placeholder="Input title in Bahasa" value="{{ @json_decode($companyDocument->title)[0]->title ?? @$companyDocument->title }}" class="form-control"/>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label"><span class="text-info">[en]</span>Title<span class="text-danger">*</span></div>
                        <input type="text" name="title_en" placeholder="Input title in English" value="{{ @json_decode($companyDocument->title)[1]->title ?? @$companyDocument->title }}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea4"><span class="text-info">[id]</span>Description</label>
                        <textarea class="form-control" name="description_id" rows="3">{{ @json_decode($companyDocument->description)[0]->description ?? @$companyDocument->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea4"><span class="text-info">[en]</span>Description</label>
                        <textarea class="form-control" name="description_en" rows="3">{{ @json_decode($companyDocument->description)[1]->description ?? @$companyDocument->description }}</textarea>
                    </div>
                    <x-form.file name="coverImage[]" multiples label="Cover Image" />
                    <x-form.file name="documents[]" multiples label="File" />
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
