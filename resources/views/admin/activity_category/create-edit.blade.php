@extends('layouts.master')
@section('title', 'Activity Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Activity Category<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Activity Category</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($event->translations ?? [0] as $key => $translation)
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('activity_category.create') ? 'Create Activity Category' : 'Update Activity Category' }}
                </x-slot>
                <form id="form-news-cat"
                    action="{{ request()->routeIs('activity_category.create') ? route('activity_category.store'): route('activity_category.update', $activityCategory->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.localization :value="@$translation->translation_id" />
                    <x-form.text :value="@$activityCategory->translation->name" label="Name" name="name" />
                </form>
                <x-slot name="footer">
                    <button form="form-news-cat" class="btn btn-primary btn-pill">Submit</button>
                    <button form="form-news-cat" class="btn btn-secondary btn-pill">Cancel</button>
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
