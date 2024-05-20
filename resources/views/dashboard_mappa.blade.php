<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mappa') }}
        </h2>
        <ol class="breadcrumb mb-0 bg-white">
            <li class="breadcrumb-item">
                <a href="{{ url('/dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Mappa</li>
        </ol>
    </x-slot>  
    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">  
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-mappa :projects="$projects" />
            </div>
        </div>
    </div>
</x-app-layout>
