@extends('layouts.master')
@section('title', 'Event Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Event<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Event</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($event->translations ?? [0] as $key => $translation)
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('event.create') ? 'Create Event' : 'Update Event' }}
                </x-slot>
                <form id="form-{{ $key }}"
                    action="{{ request()->routeIs('event.create') ? route('event.store') : route('event.update', $event->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.localization :value="@$translation->translation_id" />
                    <x-form.select :items="$categories" label="Category" name="event_category_id" :value="@$event->event_category_id" />
                    <x-form.text :value="@$event->speaker_name" label="Speaker Name" name="speaker_name" />
                    <x-form.text :value="@$event->speaker_title" label="Speaker Title" name="speaker_title" />
                    <x-form.text :value="@$translation->title" label="Title" name="title" />
                    <x-form.wysiwyg :value="@$translation->description" label="Description" name="description" />
                    <x-form.file id="embed-file" name="embed" label="File"/>
                    <x-form.text id="embed-text" label="Or Link" placeholder="External Link" name="link" value="{{ @$event->link }}"/>
                    <x-form.text :value="@$event->location" placeholder="Address" label="Address" name="location"/>
                    <x-form.maps identifier="event_{{ $key }}" lat-name="lat" lng-name="lng" :lat="@$event->lat" :lng="@$event->lng"></x-form.maps>
                    <x-form.date label="Date" value="{{ @$event->date }}" name="date"/>
                    <x-form.time label="Start At" value="{{ @$event->start_at }}" name="start_at"/>
                    <x-form.time label="End At" value="{{ @$event->end_at }}" name="end_at"/>
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
