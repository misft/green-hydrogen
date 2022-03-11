<form action="{{ $action }}" onsubmit="return confirm('Are you sure to delete this?')" method="post">
    @csrf
    @method('delete')
    <input class="btn btn-danger btn-sm btn-pill text-white" style="height: auto !important; border:initial !important" value="Delete" type="submit"/>
</form>
