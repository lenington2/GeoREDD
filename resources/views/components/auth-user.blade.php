<div class="card-header d-flex justify-content-between align-items-center bg-dark">
    <h5 class="card-title text-white">Elenco Progetti <i data-feather="info" class="feather-sm fill-white me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="In questa sezione puoi gestire i progetti, associarne uno a un cliente e crearne uno nuovo dal pulsante Nuovo"></i></h5>
</div>
<div class="card-body bg-light">
    <form action="{{ url('users/create') }}" enctype="multipart/form-data" method="POST">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <div class="card-body bg-light">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable0" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Titolo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td><input type="checkbox" id="check" name="check" value="check">
                                    <label for="vehicle1">{{$project->title}}</label></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
