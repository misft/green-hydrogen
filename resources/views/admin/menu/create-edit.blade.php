@extends('layouts.master')
@section('title', 'Menu Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Menu<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Menu</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($menu->translations ?? [0] as $key => $translation)
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('menu.create') ? 'Create Menu' : 'Update Menu' }}
                </x-slot>
                <form id="form-{{ $key }}"
                    action="{{ request()->routeIs('menu.create') ? route('menu.store'): route('menu.update', @$menu->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.localization :value="@$translation->translation_id" />
                    <x-form.select :items="$groups" name="menu_group_id" :value="@$group->id" label="Group" placeholder="Select Group" />
                    <x-form.text name="name" placeholder="Input menu name" :value="@$translation->name" label="Name" />
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
