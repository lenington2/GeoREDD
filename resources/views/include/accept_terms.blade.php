@if (Auth::check() && Auth::user()->accept_terms == 0)
<div class="modal fade" id="benvenutobdf" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <br>
            <!-- Modal Header -->
            <div class="row">
                <div class="col-12 align-self-center">
                    <img style="display: block; margin-left: auto; margin-right: auto;" width="200" src="{{ url('images/GeoREDD_logo_scritta.png') }}" alt="georedd">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <h1 style="text-align: center;">Benvenuto!</h1>
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4 text-center">
                        <x-label for="terms">
                            <div class="flex items-center justify-center">
                                <div class="ms-2">
                                    {!! __('Per proseguire, ti invitiamo a leggere e accettare l\':privacy_policy e le :specs disponibili.', [
                                        'specs' => '<a target="_blank" href="' . route('specs.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' . __('Specifiche relative agli elaborati cartografici') . '</a>',
                                        'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' . __('Informativa sulla privacy') . '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                    @endif
                </div>
            </div>
            <br><br>
            <!-- Modal footer -->
            <div class="modal-footer" style="background-color: #ffffff; color:rgb(255, 255, 255);">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Non accetto</button>
                </form>
                <form action="{{ route('accept-terms') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">Accetto</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
