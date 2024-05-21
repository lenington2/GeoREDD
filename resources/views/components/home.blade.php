<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

@include('include.delete')


<div class="row">
    <!-- Prima card: Elenco Progetti -->
    <div class="col-md-6">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark">
            <h5 class="card-title text-white">Elenco Progetti <i data-feather="info" class="feather-sm fill-white me-1"
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    title="In questa sezione puoi gestire i progetti, associarne uno a un cliente e crearne uno nuovo dal pulsante Nuovo"></i>
            </h5>
            <a href="{{ url('/new-project') }}" class="btn btn-info btn-sm">
                <span class="fas fa-plus" aria-hidden="true"></span>
                Nuovo
            </a>
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable0" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titolo</th>
                            <th>Note</th>
                            <th>Data caricamento</th>
                            <th>Caricato da</th>
                            <th style="text-align: center; width: 100px;">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->note }}</td>
                                <td>{{ $project->created_at }}</td>
                                <td><b>{{ $project->creator_name }}</b></td>
                                <td style="text-align: center; width: 100px;">
                                    <a href="{{ url('/mappa/' . $project->idproject) }}"
                                        style="float: center; font-size: 12px; margin-left: 5px;"
                                        class="btn btn-success btn-sm" data-toggle="tooltip" title="vedi progetto">
                                        <span class="fas fa-eye" aria-hidden="true"></span>
                                    </a>
                                    <a href="{{ url('/edit-project/' . $project->idproject) }}"
                                        style="float: center; font-size: 12px; margin-left: 5px;"
                                        class="btn btn-primary btn-sm" data-toggle="tooltip" data-target="#response"
                                        data-resp="" title="modifica progetto">
                                        <span class="fas fa-edit" aria-hidden="true"></span>
                                    </a>
                                    <a style="float: center; font-size: 12px; margin-left: 5px;"
                                        class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"
                                        data-idprogetto="{{ $project->idproject }}" data-title="{{ $project->title }}"
                                        title="elimina progetto">
                                        <span class="fas fa-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Seconda card: Elenco Utenti -->
    <div class="col-md-6">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark">
            <h5 class="card-title text-white">Elenco Utenti <i data-feather="info" class="feather-sm fill-white me-1"
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    title="In questa sezione puoi gestire gli utenti e crearne uno nuovo dal pulsante Nuovo"></i>
            </h5>
            <a href="{{ url('/new-user') }}" class="btn btn-info btn-sm">
                <span class="fas fa-plus" aria-hidden="true"></span>
                Nuovo
            </a>
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ruolo</th>
                            <th>Data caricamento</th>
                            <th style="text-align: center; width: 100px;">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td style="text-align: center; width: 100px;">
                                    <a href="{{ url('/edit-user/' . $user->id) }}"
                                        style="float: center; font-size: 12px; margin-left: 5px;"
                                        class="btn btn-primary btn-sm" data-toggle="tooltip" title="modifica utente">
                                        <span class="fas fa-edit" aria-hidden="true"></span>
                                    </a>
                                    <a style="float: center; font-size: 12px; margin-left: 5px;"
                                        class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUser"
                                        data-iduser="{{ $user->id }}" data-name="{{ $user->name }}"
                                        title="elimina utente">
                                        <span class="fas fa-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
