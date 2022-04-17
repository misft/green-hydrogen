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
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('menu.create') ? 'Create Menu' : 'Update Menu' }}
                </x-slot>
                <form id="form-1"
                    action="{{ request()->routeIs('menu.create') ? route('menu.store'): route('menu.update', $sectionEN->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <!-- <x-form.localization :value="@$translation->translation_id" /> -->
                    <div class="mb-2">
                        <div class="col-form-label"><span class="text-info">[id]</span>Name<span class="text-danger">*</span></div>
                        <input type="text" name="name_id" placeholder="Input menu in Bahasa" @if (isset($sectionID)) value="{{ $sectionID->name }}" @endif class="form-control"/>
                        <input type="hidden" name="id_section_id" @if (isset($sectionID)) value="{{ $sectionID->id }}" @endif class="form-control"/>
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label"><span class="text-info">[en]</span>Name<span class="text-danger">*</span></div>
                        <input type="text" name="name_en" placeholder="Input name in english" @if (isset($sectionEN)) value="{{ $sectionEN->name }}" @endif class="form-control"/>
                        <input type="hidden" name="id_section_en" @if (isset($sectionEN)) value="{{ $sectionEN->id }}" @endif class="form-control"/>
                    </div>
                    @if(!isset($sectionEN))
                        <div class="mb-2">
                            <div class="col-form-label text-muted">Parent Menu<span class="text-danger">*</span></div>
                            <select class="form-control" data-placeholder="Choose the parent" name="parent">
                            <option value="0" @if(isset($menuChoosed)) @if ($menuChoosed == 0) selected @endif @endif>Main Menu</option>
                                @foreach ($menus as $id => $menu)
                                    <option value="{{ $menu->id }}" @if(isset($menuChoosed)) @if ($menuChoosed == $menu->id) selected @endif @endif>{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="mb-2">
                        <div class="col-form-label">Link<span class="text-danger">*</span></div>
                        <input type="text" name="link" placeholder="Input menu link" @if (isset($sectionID)) value="{{ $sectionID->link }}" @endif class="form-control"/>
                    </div>
                    @if(isset($sectionEN))
                        <div class="mb-2">
                            <div class="col-form-label text-muted">Replace Position Menu With</div>
                            <select class="form-control" data-placeholder="Choose the slot" name="replaceSlot">
                                <option value="" >Choose Menu</option>
                                @foreach ($anotherMenus as $id => $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </form>
                <x-slot name="footer">
                    <button form="form-1" class="btn btn-primary btn-pill">Submit</button>
                    <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-pill">Cancel</a>
                </x-slot>
            </x-form.wizard>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
@endsection
