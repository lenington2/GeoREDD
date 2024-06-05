<div class="card-header d-flex justify-content-between align-items-center bg-dark">
    <h5 class="card-title text-white">Modifica autorizzazioni per l'utente: {{ $user->name }}</h5>
</div>

<div class="card-body bg-light">
    <form action="{{ url('authorization/create') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover" id="dataTable0" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titolo</th>
                            <th>Note</th>
                            <th>Data caricamento</th>
                            <th>Caricato da</th>
                            <th>Autorizzazione</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            @php
                                $authorization = $auth->firstWhere('project_id', $project->idproject);
                                $isAuthorized = $authorization ? $authorization->is_authorized : 0;
                            @endphp
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->note }}</td>
                                <td>{{ $project->created_at }}</td>
                                <td><b>{{ $project->creator_name }}</b></td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" name="projects[{{ $project->idproject }}]">
                                            <option value="1" {{ $isAuthorized == 1 ? 'selected' : '' }}>Si
                                            </option>
                                            <option value="0" {{ $isAuthorized == 0 ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-flat btn-sm pull-right mr-2">Salva</button>
                    <a href="{{ url('dashboard') }}" class="btn btn-danger btn-flat btn-sm pull-right mr-2">Annulla</a>
                </div>
            </div>
        </div>
    </form>
</div>
