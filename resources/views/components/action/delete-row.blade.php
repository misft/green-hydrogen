<form action="{{ $action }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs"
        type="submit">Delete</button>
</form>
