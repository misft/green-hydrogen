@foreach ($items->translation as $item)
    <h6>
        <span class="text-info">[{{ $item->translation->code }}]</span>
        {{ $encode ? json_encode($item->{$key}) : $item->{$key} }}
    </h6>
@endforeach
