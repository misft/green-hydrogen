<div class="mb-2">
    <div class="col-form-label text-muted">Category</div>
    <select class="js-example-basic-single col-sm-12" placeholder="Select Activity Category" data-placeholder="Select Activity Category" name="activity_category_id">
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
