<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<div class="card-header d-flex justify-content-between align-items-center bg-dark">
    <h5 class="card-title text-white">{{ $projects->title }} <i data-feather="info" class="feather-sm fill-white me-1"
            data-bs-toggle="tooltip" data-bs-placement="top"
            title="*********"></i>
    </h5>
</div>

<div class="card-body bg-light">
    <iframe id="GeoREDD" title="GeoREDD" style="width: 100%; height: 400" height="600" src="{{ $projects->url_mappa }}"> </iframe>
</div>
