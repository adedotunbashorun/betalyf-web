
    <div class="col-md-3">
        <div class="card bg-primary p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-bag f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="color-white">{{ count($disputes) }}</h2>
                    <p class="m-b-0">Outbreak Report</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-pink p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-comment f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="color-white">{{ $responded }}</h2>
                    <p class="m-b-0">Responded</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-vector f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="color-white">{{ $resolved }}</h2>
                    <p class="m-b-0">Resolved</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-location-pin f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="color-white">{{ $pending }}</h2>
                    <p class="m-b-0">Pending</p>
                </div>
            </div>
        </div>
    </div>