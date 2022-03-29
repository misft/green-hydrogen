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
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('project.create') ? 'Create Project' : 'Update Project' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('project.create') ? route('project.store') : route('project.update', $project->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.localization :value="@$project->translation->translation_id"/>
                    <x-form.select :items="$categories" :value="@$project->project_category_id" label="Category" name="project_category_id"/>
                    <x-form.select :items="$countries" :value="@$project->country_id" label="Country" name="country_id"/>
                    <x-form.select :items="$regions" :value="@$project->region_id" label="Region" name="region_id"/>
                    <x-form.select :items="$cities" :value="@$project->city_id" label="City" name="city_id"/>
                    <x-form.text label="Project Name" name="name" :value="@$project->name" placeholder="Insert a name"/>
                    <x-form.text label="Project Name" name="name" :value="@$project->name" placeholder="Insert a name"/>
                    <x-form.textarea label="Description" name="description" :value="@$project->description" rows="12" placeholder="Insert description"/>
                    <x-form.select :items="$statuses" label="Status" name="status" :value="@$project->status"/>
                    <x-form.text label="E-mail" name="email" :value="@$project->email" placeholder="johndoe@gmail.com"/>
                    <x-form.text label="Contact (Phone)" name="contact" :value="@$project->contact" placeholder="+62xxxxxx"/>
                    <x-form.text label="Website" name="website" :value="@$project->website" placeholder="https://foo.com"/>
                    <x-form.text label="Total Budget" name="total_budget" :value="@$project->total_budget" placeholder="Input total budget"/>
                    <x-form.maps label="Location" :lat="@$project->lat" :lng="@$project->lng" lat-name="lat" lng-name="lng"/>
                    <x-form.file name="image" label="Image"/>
                    <x-form.file name="logo" label="Logo"/>
                    <x-form.file name="member_of_image" label="Member Of"/>
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