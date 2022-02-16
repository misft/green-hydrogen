<div class="col-sm-12 col-xl-6">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="font-weight-bold">{{  $header  }}</h3>
                </div>
                <div class="card-body">
                    {{ $slot }}
                </div>
                <div class="card-footer">
                    <button form="form" class="btn btn-primary btn-pill">Submit</button>
                    <button form="form" class="btn btn-secondary btn-pill">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>