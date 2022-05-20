<div class="mb-2">
    <div class="col-form-label text-muted">{{ $label }}</div>
    <select class="form-control" data-placeholder="{{ $placeholder }}" name="{{ $name }}">
        @foreach ($items as $item)
            <option value="{{ $item->id }}" @if (@$value == $item->id) selected @endif>
                @if(count($item->translations) > 1)   
                    {{ $item->translations[0]->name.' / '.$item->translations[1]->name }}
                @else
                    {{ $item->translations[0]->name }}
                @endif
            </option>
        @endforeach
    </select>
</div>