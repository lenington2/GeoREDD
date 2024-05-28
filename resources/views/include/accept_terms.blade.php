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
                    <img style=" display: block; margin-left: auto; margin-right: auto; " width="350" border="0"
                        src="https://test.redd-realestate-data.com/logo/Logo databox-1.png" alt="databox" />
                </div>
            </div>
            {{-- <a style="display: block; margin-left: auto; margin-right: auto; border-style: none !important; border: 0 !important;"><img width="280" border="0" style="width: 280px;" src="https://test.redd-realestate-data.com/logo/Logo databox-1.png" alt="" /></a> --}}
            <div class="row align-items-start">
                <div class="col-12">
                    {{-- <h3 style="background-color: #ffffff; color:black; text-align: center;">Benvenuto nella prima versione aggiornata di databox!</h3> --}}
                    <h2 style="text-align: center;">Benvenuto in Databox!</h2>
                    <h5 style="font-size:18px; text-align: center; margin: 20px;">
                        Ti ricordiamo che il tuo username e password sono strettamente personali. 
                    </h5>
                    {{-- <h5 style="text-align: center;">Ti ricordiamo inoltre che il tuo username e password sono strettamente personali, ad uso studio. </h5> --}}
                </div>
            </div>
            <br><br>
            <!-- Modal body -->
            <div class="row align-items-start">
                <div class="col-12">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" style="background-color: #ffffff; color:rgb(255, 255, 255);">
            </div>
        </div>
    </div>
</div>
@endif