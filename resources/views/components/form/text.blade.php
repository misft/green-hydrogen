<div class="mb-2 {{ $attributes->get('class') }}">
    <div class="col-form-label">{{ $label }}</div>
    <input type="text" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}" class="form-control" oninput="{{ $attributes->get('oninput') }}" id={{$attributes->get('id')}}>
</div>