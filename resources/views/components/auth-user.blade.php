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
            <fieldset>
                <div class="container">                                                         
                    <form action="/action_page.php">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switch1" name="example">
                        <label class="custom-control-label" for="switch1">PROVA MAPPA DDPRO2</label>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-danger">Salva</button>
                    </form>
                  </div>
            </fieldset>
        </div>
    </form>
</div>
