<input form="{{ $idform ?? 'FormDelete'}}" {{$disable}} class="btn mb-1 btn-danger btn-sm btn-pill text-white" style="height: auto !important; border:initial !important" value="Delete" type="submit"/>
<form id="{{$idform ?? 'FormDelete'}}" action="{{ $action }}" onsubmit="return confirm('Are you sure to delete this?')" method="post">
    @csrf
    @method('delete')
</form>
