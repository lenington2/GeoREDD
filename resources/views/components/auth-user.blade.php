<div class="card-header d-flex justify-content-between align-items-center bg-dark">
    <h5 class="card-title text-white">Elenco Progetti <i data-feather="info" class="feather-sm fill-white me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="In questa sezione puoi gestire i progetti, associarne uno a un cliente e crearne uno nuovo dal pulsante Nuovo"></i></h5>
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
                            <th>Azioni</th>
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
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" name="projects[{{ $project->idproject }}]">
                                            <option value="1" {{ $isAuthorized == 1 ? 'selected' : '' }}>Si</option>
                                            <option value="0" {{ $isAuthorized == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-danger px-4">Salva</button>
        </div>
    </form>
</div>
