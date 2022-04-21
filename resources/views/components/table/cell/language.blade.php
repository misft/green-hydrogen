@foreach ($items->translations as $item)
    <h6>
        <span class="text-info">[{{ $item->translation->code }}]</span>
        @if($html)
        {!! substr(strip_tags($encode ? json_encode($item->{$key}) : $item->{$key}),0,100) !!}@if(strlen(strip_tags($encode ? json_encode($item->{$key}) : $item->{$key})) > 100){{__('...')}}@endif 
        @else
        {{ $encode ? json_encode($item->{$key}) : $item->{$key} }}
        @endif
    </h6>
@endforeach
