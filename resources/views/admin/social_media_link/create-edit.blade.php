@extends('layouts.master')
@section('title', 'Social Media Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Social Media<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Social Media</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('social_media.create') ? 'Create Social Media' : 'Update Social Media' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('social_media.create') ? route('social_media.store') : route('social_media.update', $data->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.text :value="@$data->name" label="Name" name="name" />
                    <div class="mb-2">
                        <div class="col-form-label text-muted">Sumber Link</div>
                        <select class="form-control" data-placeholder="" name="source">
                            @foreach ($socmed as $name)
                                <option value="{{ $name }}" @if (@$data->source == $name) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-form.text :value="@$data->link" label="Link" name="link" />
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
