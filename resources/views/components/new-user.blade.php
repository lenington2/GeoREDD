<div class="card-header d-flex justify-content-between align-items-center bg-dark">
    <h5 class="card-title text-white">Crea un nuovo utente <i data-feather="info" class="feather-sm fill-white me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="In questa sezione puoi gestire i progetti, associarne uno a un cliente e crearne uno nuovo dal pulsante Nuovo"></i></h5>
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
                <h6 class="heading-small text-muted mb-4">Informazioni</h6>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <input class="form-control form-control-sm" name="name" type="text" value="{{ old('name') }}" placeholder="Nome \*">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <input class="form-control form-control-sm" name="email" type="text" value="{{ old('email') }}" placeholder="Email \*">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating position-relative">
                            <input class="form-control form-control-sm" id="password" name="password" type="password" value="{{ old('password') }}" placeholder="Password \*">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                            <label class="form-check-label" for="showPassword">Mostra password</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating">
                            <select class="form-control form-control-sm" name="role" placeholder="Ruolo \*">
                                <option value="">Seleziona un ruolo</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        @csrf
                        <button type="submit" class="btn btn-success btn-flat btn-sm pull-right mr-2">Salva</button>
                        <a href="{{ url('dashboard') }}" class="btn btn-danger btn-flat btn-sm pull-right mr-2">Annulla</a>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("showPassword");
        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>