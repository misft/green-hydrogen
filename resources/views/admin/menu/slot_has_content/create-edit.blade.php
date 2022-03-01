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
            @foreach (@$slotContentTranslation ?? [0] as $i => $translation)
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ @$translation->translation->code }}</h5>
                                </div>
                                <div class="card-body">
                                    <form id="form"
                                        action="{{ request()->routeIs('slot_content.create') ? route('slot_content.store') : route('slot_content.update', @$slot_content->id ?? 0) }}"
                                        class="theme-form mega-form" method="post">
                                        @if(request()->routeIs('slot_content.edit'))
                                        @method('put')
                                        @endif
                                        @csrf 
                                        <x-form.localization :value="@$translation->translation->code" />
                                        <x-form.select label="Menu" :value="@$slot_content->menuSlot->menu_id" placeholder="Select Menu" name="menu_id" :items="$menus" />
                                        <x-form.select label="Slot" :value="@$slot_content->menuSlot->slot_id" placeholder="Select Slot" name="slot_id" :items="$slots" />
                                        <x-form.select label="Content Type" :value="@$slot_content->contentType->id" placeholder="Select Content Type" name="content_type_id" :items="$contentTypes" />
                                        @foreach ((array) @$translation->content ?? [0] as $j => $value)
                                            <x-form.content :slot-content="@$slot_content" :translation="$translation" />
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
