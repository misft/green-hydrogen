@extends('layouts.master')
@section('title', 'Activity Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Activity<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Activity</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($activity->translations ?? [0] as $key => $translation)
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('activity.create') ? 'Create Activity' : 'Update Activity' }}
                </x-slot>
                <form id="form-{{ $key }}"
                    action="{{ request()->routeIs('activity.create') ? route('activity.store'): route('activity.update', $activity->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.localization :value="@$translation->translation_id" />
                    <x-form.activity-category.select />
                    <x-form.text :value="@$translation->title" label="Title" name="title" />
                    <x-form.wysiwyg :value="@$translation->description" label="Description" name="description" />
                    @if (request()->routeIs('activity.edit'))
                        <div class="mb-2">
                            <?php
                            $result = json_decode($activity->embed);
                            ?>
                            @if (json_last_error() === JSON_ERROR_NONE)
                                <img style="max-width: 200px;" class="img-rounded" src="{{asset('storage/' . @json_decode($activity->embed) )}}" alt="">
                            @else
                                <img style="max-width: 200px;" class="img-rounded" src="{{ $activity->embed }}">
                            @endif
                        </div>
                    @endif
                    <select class="js-example-basic-single col-sm-12" name="type_embed" id="type_embed">
                            <option selected>Pilih Tipe Lampiran</option>
                            <option value="file">File</option>
                            <option value="link">Link</option>
                    </select>
                    <x-form.file class="fileinput d-none" label="File Embed" name="embed" />
                    <x-form.text class="textinput d-none" :value="@$translation->embed" label="Link Embed" name="embed"/>

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
    <script>
        $(document).ready(() => {
            $('#type_embed').on('change', function(){
                var Lampiran = $(this).val()
                if(Lampiran === 'file'){
                    $('.fileinput').removeClass('d-none')
                    $('.textinput').addClass('d-none')
                }else if(Lampiran === 'link'){
                    $('.fileinput').addClass('d-none')
                    $('.textinput').removeClass('d-none')
                }else{
                    $('.fileinput').addClass('d-none')
                    $('.textinput').addClass('d-none')
                }
            })
        })
    </script>
@endsection
