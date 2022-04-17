@extends('layouts.master')
@section('title', 'Menu Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
    <script defer src="https://unpkg.com/alpinejs@3.9.6/dist/cdn.min.js"></script>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/summernote.css">
@endsection

@section('breadcrumb-title')
    <h2>Content<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Content</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row" x-data="{ name: '{{ $contentEN->name ?? '' }}' }" >
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('content.create') ? 'Create Content' : 'Update Content' }}
                </x-slot>
                <form id="form-1"
                    action="{{ request()->routeIs('content.create') ? route('content.store'): route('content.update', $contentEN->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <!-- <x-form.localization :value="@$translation->translation_id" /> -->
                    @if(!isset($contentEN))
                        <div class="mb-2">
                            <div class="col-form-label text-muted">Slot<span class="text-danger">*</span></div>
                            <select class="form-control" data-placeholder="Choose the parent" name="slot">
                            <option value="" >Choose the slot</option>
                                @foreach ($spots as $id => $spot)
                                    <option value="{{ $spot->id }}" @if(isset($menuChoosed)) @if ($menuChoosed == $spot->id) selected @endif @endif>{{ 'Menu '.$spot->section->name.' - '.$spot->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if(!isset($contentEN))
                        <div class="mb-2">
                            <div class="col-form-label text-muted">Type<span class="text-danger">*</span></div>
                            <select class="form-control" name="name" x-model="name">
                            <option value="" >Choose the type</option>
                                @foreach($dropdownTypeValues as $val)
                                    <option value="{{ $val['id'] }}">{{ $val['value'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <div class="col-form-label">Position<span class="text-danger">*</span></div>
                            <input type="text" name="positions" placeholder="Example: left, right, and middle" @if (isset($contentEN)) value="{{ $contentEN->positions }}" @endif class="form-control"/>
                        </div>
                    @endif
                    <div x-show="name == 'title' || name == 'button'">
                        <div class="col-form-label"><span class="text-info">[id]</span>Content<span class="text-danger">*</span></div>
                        <input type="text" name="content_tb_id" placeholder="Input text in Bahasa" @if (isset($contentID)) value="{{ $contentID->content }}" @endif class="form-control"/>
                    </div>
                    <div x-show="name == 'title' || name == 'button'">
                        <div class="col-form-label"><span class="text-info">[en]</span>Content<span class="text-danger">*</span></div>
                        <input type="text" name="content_tb_en" placeholder="Input text in English" @if (isset($contentEN)) value="{{ $contentEN->content }}" @endif class="form-control"/>
                    </div>
                    <div x-show="name == 'description'">
                        <div class="col-form-label"><span class="text-info">[id]</span>Description</div>
                        <textarea name="content_d_id" id="summernote" class="summernote" cols="30" rows="10">{{ @$contentID->content }}</textarea>
                    </div>
                    <div x-show="name == 'description'">
                        <div class="col-form-label"><span class="text-info">[en]</span>Description</div>
                        <textarea name="content_d_en" id="summernote" class="summernote" cols="30" rows="10">{{ @$contentEN->content }}</textarea>
                    </div>
                    <div x-show="name == 'picture' || name == 'video'">
                        <x-form.file label="File" name="content" />
                    </div>
                    <div x-show="name == 'link' ||  name == 'video_link'">
                        <x-form.text :value="@$contentEN->content" label="Link" name="content" />
                    </div>
                    @if(isset($contentEN))
                    <input type="hidden" name="name" @if (isset($contentID)) value="{{ $contentID->name }}" @endif class="form-control"/>
                        <div class="mb-2">
                            <div class="col-form-label">Position<span class="text-danger">*</span></div>
                            <input type="text" name="display_position" placeholder="Example: left, right, and middle" @if (isset($contentEN)) value="{{ $contentEN->positions.'_'.$contentEN->name.'_'.++$contentEN->order }}" @endif class="form-control" readonly/>
                        </div>
                        <div class="mb-2">
                            <div class="col-form-label text-muted">Replace Position Content With</div>
                            <select class="form-control" data-placeholder="Choose the content" name="replaceContent">
                                <option value="" >Choose content</option>
                                @foreach ($anotherContents as $item)
                                    <option value="{{ $item->id }}">{{ $item->positions.'_'.$item->name.'_'.++$item->order }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </form>
                <x-slot name="footer">
                    <button form="form-1" class="btn btn-primary btn-pill">Submit</button>
                    <a href="{{ route('content.index') }}" class="btn btn-secondary btn-pill">Cancel</a>
                </x-slot>
            </x-form.wizard>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
    <script src="{{route('/')}}/assets/js/editor/summernote/summernote.js"></script>
    <script src="{{route('/')}}/assets/js/editor/summernote/summernote.custom.js"></script>
@endsection
