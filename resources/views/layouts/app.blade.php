<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>GeoREDD</title>        
        <link rel="shortcut icon" type="image/png" href="{{ url('images/mondos.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

         <!-- Custom fonts for this template-->
        <link href="contenido/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="contenido/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

         <!-- Bootstrap core JavaScript-->
         <script src="contenido/jquery/jquery.min.js"></script>
         <script src="contenido/bootstrap/js/bootstrap.bundle.min.js"></script>
     
         <!-- Core plugin JavaScript-->
         <script src="contenido/jquery-easing/jquery.easing.min.js"></script>
     
         <!-- Custom scripts for all pages-->
         <script src="js/sb-admin-2.min.js"></script>
 
          <!-- Page level plugins -->
         <script src="contenido/datatables/jquery.dataTables.min.js"></script>
         <script src="contenido/datatables/dataTables.bootstrap4.min.js"></script>
 
         <!-- Page level custom scripts -->
         <script src="js/demo/datatables-demo.js"></script>
     
         <!-- Page level plugins -->
         {{-- <script src="contenido/chart.js/Chart.min.js"></script> --}}
     
         <!-- Page level custom scripts -->
         {{-- <script src="js/demo/chart-area-demo.js"></script>
         <script src="js/demo/chart-pie-demo.js"></script> --}}
    </body>
</html>
