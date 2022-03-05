@foreach ($items->translations as $item)
    <h6>
        <span class="text-info">[{{ $item->translation->code }}]</span>
        @if($html)
        {!! $encode ? json_encode($item->{$key}) : $item->{$key} !!}
        @else
        {{ $encode ? json_encode($item->{$key}) : $item->{$key} }}
        @endif
    </h6>
@endforeach
