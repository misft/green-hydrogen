@extends('layouts.master')
@section('title', 'Newsletter Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ route('/') }}/assets/css/select2.css">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Newsletter<span>Forms</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Forms</li>
    <li class="breadcrumb-item active">Newsletter</li>
    {{-- <li class="breadcrumb-item active">Index</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <x-form.wizard>
                <x-slot name="header">
                    {{ request()->routeIs('newsletter.create') ? 'Send Newsletter' : 'Show Newsletter Detail' }}
                </x-slot>
                <form id="form"
                    action="{{ request()->routeIs('newsletter.create') ? route('newsletter.store'): route('newsletter.update', $newsletter->id) }}"
                    class="theme-form mega-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <x-form.put-method  />
                    <x-form.text :value="@$newsletter->subject" label="Title" name="subject" />
                    <x-form.wysiwyg :value="@$newsletter->content" label="Description" name="content" />
                    @if (request()->routeIs('newsletter.create'))
                    {{-- <div>
                        <label for="send_at">Schedule Pengiriman</label><br />
                        <input type="date" value="{{@$newsletter->send_at}}"  name="send_at" id="send_at">
                    </div> --}}
                        <x-form.file label="File" name="attachments[]" multiple />
                    @else
                    <div>
                        <label for="send_at">Pengiriman</label><br />
                        <input type="text" value="{{@$newsletter->send_at}}"  name="send_at" id="send_at">
                    </div>
                    <div class="mt-3">
                        <label for="">File Attachment</label>
                        <ol>
                        @foreach (@json_decode($newsletter->attachments) as $each )
                            <li><a href="{{ asset('storage/' . $each)}}" class="badge badge-secondary">File Attachment</a></li>
                        @endforeach
                        </ol>
                    </div>
                    @endif
                </form>
                <x-slot name="footer">
                    @if (request()->routeIs('newsletter.create'))
                    <button form="form" class="btn btn-primary btn-pill">Submit</button>
                    <x-action.cancel />
                    @else
                    <a href="{{URL::previous()}}" class="btn btn-secondary">Back</a>
                    @endif
                </x-slot>
            </x-form.wizard>
        </div>
    </div>
@endsection

@section('script')
@if (request()->routeIs('newsletter.show'))
<script>
    $(document).ready(()=>{
        $('input[name="subject"]').prop('disabled', true);
        $('input[name="send_at"]').prop('disabled', true);
        $('textarea[name="content"]').prop('disabled', true);
        $('#summernote'). summernote('disable');
    })
</script>
@endif
    <script src="{{ route('/') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ route('/') }}/assets/js/select2/select2-custom.js"></script>
@endsection
