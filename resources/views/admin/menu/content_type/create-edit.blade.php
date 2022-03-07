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
                    {{ request()->routeIs('content_type.create') ? 'Create Content Type' : 'Update Content Type' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('content_type.create') ? route('content_type.store'): route('content_type.update', @$contentType->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.text name="name" :value="@$contentType->name" label="Name" placeholder="Pick a name" />
                    <x-form.textarea name="description" :value="@$contentType->description" label="Description" placeholder="Props in JSON" />
                    <x-form.text name="form" :value="@$contentType->form" label="Form" placeholder="Pick a form" />
                    <x-form.textarea name="props" :value="@$contentType->props" label="Props" placeholder="Props in JSON" />
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
