<div class="row justify-content-between">
    <div class="col-12">
    <div class="row">
        <x-form.file class="col-6" id="embed-file-{{ $name }}" name="{{ $name }}" label="{{ $label }}"/>
        <x-form.text class="col-6" id="embed-text-{{ $name }}" label="Or Link" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}"/>
    </div>
    </div>
</div>

@push('script')
<script>
    function toggle(event, name) {
        event.preventDefault();
    
        console.log($(`#embed-file-${name}`).is('visible'))
    }
</script>
@endpush