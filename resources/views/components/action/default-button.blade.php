<input form="{{$idform}}" type="submit" value="PILIH DEFAULT" class="btn btn-sm btn-pill mb-1 btn-primary">
<form id="{{$idform}}" action="{{$action}}" method="POST">
    @csrf
    {{-- @method('PUT') --}}
    <input type="hidden" name="value" value="{{$value}}">
    <input type="hidden" name="params" value="{{$params}}">
</form>
