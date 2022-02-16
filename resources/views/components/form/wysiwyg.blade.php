<div class="mb-2">
    @push('style')
    <link rel="stylesheet" type="text/css" href="{{route('/')}}/assets/css/summernote.css">
    @endpush
    <div class="col-form-label">{{ $label }}</div>
    <textarea name="{{ $name }}" id="summernote" class="summernote" cols="30" rows="10">{!! $value !!}</textarea>
    @push('script')
    <script src="{{route('/')}}/assets/js/editor/summernote/summernote.js"></script>
    <script src="{{route('/')}}/assets/js/editor/summernote/summernote.custom.js"></script>
    @endpush
</div>