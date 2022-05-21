@extends('layouts.master')
@section('title', 'Auto Reply Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Auto Reply Newsletter<span>Set Up</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Auto Reply Newsletter</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <x-form.wizard>
                <x-slot name="header">
                    {{ empty($autoReply) ? 'Create Auto Reply Newsletter First!' : 'Update Auto Reply Newsletter' }}
                </x-slot>
                <form id="form"
                    action="{{ empty($autoReply) ? route('autoreply.store') : route('autoreply.update', @$autoReply->id) }}"
                    class="theme-form mega-form" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(!empty($autoReply))
                    @method('PUT')
                    @endif
                    <x-form.text label="Title Auto Replay" name="title" :value="@$autoReply->title" />
                    <x-form.wysiwyg :value="@$autoReply->content" label="Auto Replay Content" name="content" />
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
