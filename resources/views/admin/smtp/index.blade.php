@extends('layouts.master')
@section('title', 'SMTP Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>SMTP<span>Set Up</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">SMTP</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <x-form.wizard>
                <x-slot name="header">
                    {{ empty($smtpConfig) ? 'Create SMTP First!' : 'Update SMTP' }}
                </x-slot>
                <form id="form"
                    action="{{ empty($smtpConfig) ? route('smtp.store') : route('smtp.update', @$smtpConfig->id) }}"
                    class="theme-form mega-form" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(!empty($smtpConfig))
                    @method('PUT')
                    @endif
                    <x-form.text :value="@$smtpConfig->smtp_server" label="SMTP Server" name="smtp_server" />
                    <x-form.select :items="$port" placeholder="Pilih Port" name="smtp_port" label="SMTP Port"
                        :value="@$smtpConfig->smtp_port"></x-form.select>
                    <x-form.text :value="@$smtpConfig->smtp_username" label="SMTP Username" name="smtp_username" />
                    <x-form.text :value="@$smtpConfig->smtp_password" label="SMTP Password" password="1" name="smtp_password" />
                    <x-form.select :items="$auth" placeholder="Pilih Port" name="smtp_auth" label="SMTP Auth"
                        :value="@$smtpConfig->smtp_auth == null ? 'NONE' : @$smtpConfig->smtp_auth"></x-form.select>
                    <x-form.text :value="@$smtpConfig->smtp_from" label="SMTP From" name="smtp_from" />
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
