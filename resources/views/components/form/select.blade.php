<div class="mb-2">
    <div class="col-form-label text-muted">{{ $label }}</div>
    <select class="js-example-basic-single col-sm-12" data-placeholder="{{ $placeholder }}" name="{{ $name }}">
        @foreach ($items as $id => $name)
            <option value="{{ $id }}" @if (@$value == $id) selected @endif>{{ $name }}</option>
        @endforeach
    </select>
</div>