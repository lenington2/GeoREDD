<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
@include('include.delete')
@include('include.accept_terms')

<div class="row">
    <div class="col-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark">
            <h5 id="card-title" class="card-title text-white">
                Elenco progetti
                <i data-feather="info" class="feather-sm fill-white me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                    title=""></i>
            </h5>
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable0" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titolo</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td>
                                    <button class="btn btn-primary show-map" data-url="{{ $project->url_mappa }}"
                                        data-title="{{ $project->title }}" data-id="{{ $project->idproject }}">
                                        {{ $project->title }}
                                    </button>
                                </td>
                                <td>{{ $project->note }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Nessun progetto ancora assegnato.</td>
                            </tr>
                        @endforelse
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
                    <button type="button" class="btn btn-primary dropdown-toggle"
                        data-toggle="dropdown">Azioni</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" id="fullScreenBtn">Fullscreen</a>
                        <a id="download-link" class="dropdown-item" href="download/italy">Scarica layers</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light" id="cardBody">
                <iframe id="GeoREDD" title="GeoREDD" style="width: 100%; height: 400" height="600"
                    src="https://webgis.redd-realestate-data.com/en/map/territorio-italiano/?__bratk=2b24b82d91f4ab903651a0b36e375caffbe58003"></iframe> {{-- mappa italia --}}
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



    $(document).ready(function() {
        var accepted = localStorage.getItem('accepted');
        if (!accepted) {
            $('#benvenutobdf').modal('toggle');
        }

        $('#acceptBtn').click(function() {
            // Memorizza lo stato di accettazione
            localStorage.setItem('accepted', true);
            // Chiudi il modal
            $('#benvenutobdf').modal('hide');
        });
    });
</script>
