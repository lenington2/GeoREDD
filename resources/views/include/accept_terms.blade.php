@if (Auth::check() && Auth::user()->accept_terms == 0)
<div class="modal fade" id="benvenutobdf" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <br>
            <!-- Modal Header -->
            <div class="row">
                <div class="col-12 align-self-center">
                    <img style=" display: block; margin-left: auto; margin-right: auto; " width="200" 
                        src="https://test.redd-realestate-data.com/logo/REDD_rosso.png" alt="redd">
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col-12">
                    <h2 style="text-align: center;">Benvenuto in GeoRedd!</h2>
                    <h5 style="font-size:18px; text-align: center; margin: 20px;">
                        Ti ricordiamo che il tuo username e password sono strettamente personali. 
                    </h5>
                </div>
            </div>
            <br><br>
            <!-- Modal footer -->
            <div class="modal-footer" style="background-color: #ffffff; color:rgb(255, 255, 255);">
                <form action="{{ route('accept-terms') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Accetta</button>
                </form>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        <span class="fas fa-sign-out-alt" aria-hidden="true"></span>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
