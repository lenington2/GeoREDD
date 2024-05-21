<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <ol class="breadcrumb mb-0 bg-white">
            <li class="breadcrumb-item">
                <a href="{{ url('/dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-homeUser :projects="$projects" />
            </div>
        </div>
    </div>
</x-app-layout>
