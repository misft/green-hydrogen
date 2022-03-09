<div class="mb-2">
    <label class="col-form-label">{{ $label }}</label>
    <div class="row">
        <input id="embed-file-{{ $name }}" class="form-control col" type="file" name="{{ $name }}">
        <input id="embed-link-{{ $name }}" class="form-control col" type="text" name="{{ $name }}" value="{{ $value }}">
        <button class="btn btn-primary col-auto">Switch</button>
    </div>
 </div>

@push('script')

@endpush