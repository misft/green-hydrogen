@extends('layouts.master')
@section('title', 'Menu Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Slot Menu<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Slot Menu</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('menu_slot.create') ? 'Create Menu Slot' : 'Update Menu Slot' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('menu_slot.create') ? route('menu_slot.store'): route('menu_slot.update', @$menuHasSlot->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.select :items="$menus" :value="@$menuHasSlot->menu_id" name="menu_id" placeholder="Select a menu" label="Menu"></x-form.select>
                    <x-form.select :items="$slots" :value="@$menuHasSlot->slot_id" name="slot_id" placeholder="Select a slot" label="Slot"></x-form.select>
                    <x-form.text name="order" :value="@$menuHasSlot->order" label="Order" placeholder="Pick an order in number"/>
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
