<div class="card-header d-flex justify-content-between align-items-center bg-dark">
    <h5 class="card-title text-white">Crea un nuovo progetto <i data-feather="info" class="feather-sm fill-white me-1"
            data-bs-toggle="tooltip" data-bs-placement="top"
            title="In questa sezione puoi gestire i progetti, associarne uno a un cliente e crearne uno nuovo dal pulsante Nuovo"></i>
    </h5>
</div>
<div class="card-body bg-light">
    <form action="{{ url('projects') }}" method="POST">
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
                                value="{{ old('title') }}" placeholder="Titolo *">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <input class="form-control form-control-sm" name="title" type="text"
                                value="{{ old('url_mappa') }}" placeholder="URL *">
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Note</label>
                            <textarea id="tiny" class="form-control" name="note" rows="5">{{ old('note') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        @csrf
                        <button type="submit" class="btn btn-success btn-flat btn-sm pull-right mr-2">Salva</button>
                        <a href="{{ url('projects') }}"
                            class="btn btn-danger btn-flat btn-sm pull-right mr-2">Annulla</a>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
</div>

