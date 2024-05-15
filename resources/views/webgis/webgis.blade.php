@extends('structure')
@section('title','Webgis')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Webgis</h3>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Webgis</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Start Page Content -->
        <!-- -------------------------------------------------------------- -->
        <div class="widget-content searchable-container list">
            <div class="card">
                <div class="contiframe">
                    <iframe sandbox="allow-scripts allow-same-origin allow-top-navigation allow-forms allow-popups allow-pointer-lock allow-popups-to-escape-sandbox" class="iframe" src="https://webgis.redd-realestate-data.com/?rs:embed=true" width="100%" height="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
