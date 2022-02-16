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
            @foreach ($slot_content->translation as $translation)
                <div class="col-sm-12 col-xl-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ $translation->getCode() }}</h5>
                                </div>
                                <div class="card-body">
                                    <form id="form"
                                        action="{{ request()->is('slot_content.create')? route('slot_content.create'): route('slot_content.update', $slot_content->id) }}"
                                        class="theme-form mega-form" method="post">
                                        @method('put')
                                        @csrf
                                        <x-form.localization :value="$translation->getCode()" />

                                        @foreach ((array) $translation->content as $key => $value)
                                            <x-dynamic-component :component="'form.'.$value['type']" :name="$key"
                                                :label="$value['type']" />
                                        @endforeach
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button form="form" class="btn btn-primary btn-pill">Submit</button>
                                    <button form="form" class="btn btn-secondary btn-pill">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
@endsection
