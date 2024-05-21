<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
@include('include.delete')

<div class="row">
    <div class="col-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark">
            <h5 id="card-title" class="card-title text-white">
                Elenco progetti
                <i data-feather="info" class="feather-sm fill-white me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="*********"></i>
            </h5>
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable0" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titolo</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td><button class="btn btn-primary show-map" data-url="{{ $project->url_mappa }}" data-title="{{ $project->title }}" data-id="{{ $project->idproject }}">Mostra Mappa</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card" id="fullCard">
            <div class="card-header d-flex justify-content-between align-items-center bg-dark">
                <h4 id="project-title" class="card-title text-white">
                    Mappa Italia
                </h4>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Azioni</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" id="fullScreenBtn">Fullscreen</a>
                        <a id="download-link" class="dropdown-item" href="#">Scarica layers</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light" id="cardBody">
                <iframe id="GeoREDD" title="GeoREDD" style="width: 100%; height: 400" height="600" src="https://google.com"></iframe>  {{-- inserire mappa Italia --}}
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.show-map').click(function() {
            var mapUrl = $(this).data('url');
            var projectTitle = $(this).data('title');
            var projectId = $(this).data('id');

            // Update the iframe source
            $('#GeoREDD').attr('src', mapUrl);

            // Update the card title
            $('#project-title').text('Mappa ' + projectTitle);

            // Update the download link
            $('#download-link').attr('href', '/download/' + projectId);
        });
    });
</script>