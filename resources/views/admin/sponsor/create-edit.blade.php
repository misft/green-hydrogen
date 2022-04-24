@extends('layouts.master')
@section('title', 'Sponsor Management')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h2>Sponsor<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Forms</li>
<li class="breadcrumb-item active">Sponsor</li>
{{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <x-form.wizard>
            <x-slot name="header">
                {{ request()->routeIs('sponsor.create') ? 'Create Sponsor' : 'Update Sponsor' }}
            </x-slot>
            <form id="form"
                action="{{ request()->routeIs('sponsor.create') ? route('sponsor.store') : route('sponsor.update', $sponsor->id) }}"
                class="theme-form mega-form" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.put-method />
                <x-form.select :items="$sponsorGroup" label="Grup" name="sponsor_group_id" placeholder="Pilih Group"
                    :value="@$sponsor->sponsor_group_id" />
                <x-form.text :value="@$sponsor->name" label="Name" name="name" />
                <x-form.text :value="@$sponsor->link" label="Link" name="link" />
                @if (request()->routeIs('sponsor.update'))
                    <img src="{{$sponsor->image}}" alt="" style="max-width: 200px">
                @endif
                <x-form.file name="image" label="Image" />

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
