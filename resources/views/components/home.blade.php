<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
@if ($errors->any())
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    </div>
@endif
@if (session('message'))
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('message') }}
        </div>
    </div>
@endif
@if (session('error'))
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('error') }}
        </div>
    </div>
@endif
<div class="card-header d-flex justify-content-between align-items-center bg-dark">
    <h5 class="card-title text-white">Elenco Progetti <i data-feather="info" class="feather-sm fill-white me-1"
            data-bs-toggle="tooltip" data-bs-placement="top"
            title="In questa sezione puoi gestire i progetti, associarne uno a un cliente e crearne uno nuovo dal pulsante Nuovo"></i>
    </h5>
    <a href="{{url('/new-project')}}" class="btn btn-info btn-sm">
        <i data-feather="plus" class="feather-sm fill-white me-1"></i>
        Nuovo
    </a>
</div>
<div class="card-body bg-light">
    <div class="table-responsive">
        <table class="table table-hover" id="dataTable0" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Utente</th>
                    <th>Titolo</th>
                    <th>Url mappa</th>
                    <th>Note</th>
                    <th>Data caricamento</th>
                    <th style="text-align: center; width: 100px;">Azioni</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $row)  --}}
                <tr>
                    <td><b></b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center; width: 100px;">
                        <a style="float: center; font-size: 12px; margin-left: 5px;" class="btn btn-success btn-sm"
                            data-toggle="tooltip" data-target="#response" data-resp="" title="vedi progetto">
                            <span class="fas fa-eye" aria-hidden="true"></span>
                        </a>
                        <a style="float: center; font-size: 12px; margin-left: 5px;" class="btn btn-primary btn-sm"
                            data-toggle="tooltip" data-target="#response" data-resp="" title="modifica progetto">
                            <span class="fas fa-edit" aria-hidden="true"></span>
                        </a>
                        <a style="float: center; font-size: 12px; margin-left: 5px;" class="btn btn-danger btn-sm"
                            data-toggle="tooltip" data-target="#response" data-resp="" title="elimina progetto">
                            <span class="fas fa-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
                {{--  @endforeach    --}}
            </tbody>
        </table>
    </div>
</div>
