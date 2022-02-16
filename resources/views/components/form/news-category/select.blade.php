<div class="mb-2">
    <div class="col-form-label text-muted">Category</div>
    <select class="js-example-basic-single col-sm-12" placeholder="Select News Category" data-placeholder="Select News Category" name="news_category_id">
        @foreach ($items as $id => $name)
            <option value="{{ $id }}" @if (@$value == $id) selected @endif>{{ $name }}</option>
        @endforeach
    </select>
</div>