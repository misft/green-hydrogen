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
            @foreach ($news->translation ?? [0] as $translation)
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('news.create') ? 'Create News' : 'Update News' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('news.create') ? route('news.store'): route('news.update', $news->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.localization :value="@$translation->translation->code" />
                    <x-form.news-category.select />
                    <x-form.text :value="@$translation->title" label="Title" name="title" /> 
                    <x-form.wysiwyg :value="@$translation->description" label="Description" name="description" />
                    <x-form.file label="File" name="embed" multiple />
                </form>
            </x-form.wizard>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
@endsection
