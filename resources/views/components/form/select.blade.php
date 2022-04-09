<div class="mb-2">
    <div class="col-form-label text-muted">{{ $label }}</div>
    <select class="form-control" data-placeholder="{{ $placeholder }}" name="{{ $name }}">
        @foreach ($items as $id => $name)
            <option value="{{ $id }}" @if (@$value == $id) selected @endif>{{ $name }}</option>
        @endforeach
    </select>
</div>
