@extends('layouts.master')
@section('title', 'News Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>News<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">News</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($news->translations ?? [0] as $key => $translation)
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('news.create') ? 'Create News' : 'Update News' }}
                </x-slot>
                <form id="form-{{ $key }}"
                    action="{{ request()->routeIs('news.create') ? route('news.store'): route('news.update', $news->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.localization :value="@$translation->translation_id" />
                    <x-form.news-category.select />
                    <x-form.text :value="@$translation->title" label="Title" name="title" />
                    <x-form.wysiwyg :value="@$translation->description" label="Description" name="description" />
                        <div class="mb-2">
                            <img style="max-width: 200px;" src="{{asset('storage/' . @json_decode($news->embed) )}}" alt="">
                        </div>
                    <x-form.file label="File" name="embed" multiple />
                </form>
                <x-slot name="footer">
                    <button form="form-{{ $key }}" class="btn btn-primary btn-pill">Submit</button>
                    <button form="form-{{ $key }}" class="btn btn-secondary btn-pill">Cancel</button>
                </x-slot>
            </x-form.wizard>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
@endsection
