<div class="card-header d-flex justify-content-between align-items-center bg-dark">
    <h5 class="card-title text-white">Modifica progetto <i data-feather="info" class="feather-sm fill-white me-1"
            data-bs-toggle="tooltip" data-bs-placement="top"
            title="In questa sezione puoi gestire i progetti, associarne uno a un cliente e crearne uno nuovo dal pulsante Nuovo"></i>
    </h5>
</div>

<div class="card-body bg-light">
    <form action="{{ url('projects/update/' . $project->idproject) }}" enctype="multipart/form-data" method="POST">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <fieldset>
                <h6 class="heading-small text-muted mb-4">Informazioni</h6>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <input class="form-control form-control-sm" name="title" type="text"
                                value="{{ $project->title }}" placeholder="Titolo *">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <input class="form-control form-control-sm" name="url" type="text"
                                value="{{ $project->url_mappa }}" placeholder="URL *">
                        </div>
                    </div>
                </div>
                <h6 class="heading-small text-muted mb-4">File</h6>
                <div class="col-md-12 mb-3">
                    <label for="current_file">File attuale:</label>
                    @if ($project->file_path)
                        <a href="{{ Storage::url($project->file_path) }}" target="_blank">Visualizza</a><br>
                        <input type="checkbox" id="delete_file" name="delete_file" value="1">
                        <label for="delete_file">Elimina file</label>
                    @else
                        Nessun file caricato.
                    @endif
                </div>

                <div id="file_input_wrapper" class="col-md-12 mb-3" @if (!$project->file_path) style="display: block;" @else style="display: none;" @endif>
                    <input class="form-control mt-3" type="file" name="file">
                </div>
                <hr class="my-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Note</label>
                            <textarea id="tiny" class="form-control" name="note" rows="5">{{ $project->note }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        @csrf
                        <input type="hidden" name="idproject" value="{{ $project->idproject }}">
                        <button type="submit" class="btn btn-success btn-flat btn-sm pull-right mr-2">Salva</button>
                        <a href="{{ url('dashboard') }}"
                            class="btn btn-danger btn-flat btn-sm pull-right mr-2">Annulla</a>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteFileCheckbox = document.getElementById("delete_file");
        const fileInputWrapper = document.getElementById("file_input_wrapper");

        deleteFileCheckbox.addEventListener("change", function() {
            if (this.checked) {
                fileInputWrapper.style.display = "block"; // Mostra il campo di caricamento del file se l'utente vuole eliminare il file attuale
            } else {
                fileInputWrapper.style.display = "none"; // Nascondi il campo di caricamento del file se l'utente non vuole eliminare il file attuale
            }
        });
    });
</script>
