<form action="{{ $action }}" onsubmit="return confirm('Are you sure to delete this?')" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger btn-xs" data-original-title="btn btn-danger btn-xs" type="submit">Delete</button>
</form>
