@extends('layouts.master')
@section('title', 'Video Publication Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Video Publication<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Video Publication</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($publication->translations ?? [0] as $key => $translation)
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('video_publication.create') ? 'Create Video Publication' : 'Update Video Publication' }}
                </x-slot>
                <form id="form-{{ $key }}"
                    action="{{ request()->routeIs('video_publication.create') ? route('video_publication.store') : route('video_publication.update', $publication->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.localization :value="@$translation->translation_id" />
                    <x-form.text :value="@$translation->title" label="Title" name="title"/>
                    <x-form.textarea :value="@$translation->description" label="Description" name="description" />
                    <x-form.text :value="@$publication->embed" name="embed" label="Embed"/>
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
