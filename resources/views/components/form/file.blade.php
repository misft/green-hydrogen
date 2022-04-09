<div class="mb-2 {{ $attributes->get('class') }}">
    <label class="col-form-label">{{ $label }}</label>
    <input {{ $multiple }} {{ $attributes }} class="form-control" type="file" name="{{ $name }}">
 </div>
