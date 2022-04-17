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
                    {{ request()->routeIs('slot.create') ? 'Create Slot' : 'Update Slot' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('slot.create') ? route('slot.store'): route('slot.update', $slotEN->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    @if(!isset($slotEN))
                        <div class="mb-2">
                            <div class="col-form-label text-muted">Menu<span class="text-danger">*</span></div>
                            <select class="form-control" data-placeholder="Choose the menu" name="menu">
                                @foreach ($menus as $id => $menu)
                                    <option value="{{ $menu->id }}" @if(isset($menuChoosed)) @if ($menuChoosed == $menu->id) selected @endif @endif>{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="mb-2">
                        <div class="col-form-label"><span class="text-info">[id]</span>Slot Name<span class="text-danger">*</span></div>
                        <input type="text" name="name_id" placeholder="Input menu in Bahasa" @if (isset($slotID)) value="{{ $slotID->name }}" @endif class="form-control"/>
                        <input type="hidden" name="id_section_id" @if (isset($slotID)) value="{{ $slotID->id }}" @endif class="form-control"/>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label"><span class="text-info">[en]</span>Slot Name<span class="text-danger">*</span></div>
                        <input type="text" name="name_en" placeholder="Input name in english" @if (isset($slotEN)) value="{{ $slotEN->name }}" @endif class="form-control"/>
                        <input type="hidden" name="id_section_en" @if (isset($slotEN)) value="{{ $slotEN->id }}" @endif class="form-control"/>
                    </div>
                    @if(isset($slotEN))
                        <div class="mb-2">
                            <div class="col-form-label text-muted">Replace Position Slot With</div>
                            <select class="form-control" data-placeholder="Choose the slot" name="replaceSlot">
                                <option value="" >Choose Slot</option>
                                @foreach ($anotherSlot as $id => $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </form>
                <x-slot name="footer">
                    <button form="form" class="btn btn-primary btn-pill">Submit</button>
                    <a href="{{ route('slot.index') }}" class="btn btn-secondary btn-pill">Cancel</a>
                </x-slot>
            </x-form.wizard>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
@endsection
