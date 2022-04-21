<input form="{{$idform}}" type="submit" value="{{$value == 0 ? 'VERIFY' : 'DEACTIVATE'}}" class="btn btn-sm btn-pill mb-1 btn-primary">
<form id="{{$idform}}" action="{{$action}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="is_active" value="{{$value ? 0 : 1 }}">
    <input type="hidden" name="email" value="{{$email}}">
</form>
