<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>{{ $title }}</h5>
            <span>{{ $description }}</span>
        </div>
        <div class="card-body">
            @if($createRoute)
            <x-action.create-button :route="$createRoute" />
            @endif
            <div class="table-responsive product-table">
                <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            @foreach ($headers as $item)
                            <th>{{ $item }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        {{ $data }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>