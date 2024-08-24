<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Detail Provinsi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        <h4 class="mb-0">{{ $provinsi->nama }}</h4>
                    </div>
                    <div class="card-body text-center">
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                            <span class="font-weight-bold"> Kode Provinsi: </span> 
                            {{ $provinsi->kode }}
                        </p>
                        <p class="mb-4">
                            <i class="fas fa-landmark text-primary"></i>
                            <span class="font-weight-bold"> Nama Provinsi: </span> 
                            {{ $provinsi->nama }}
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ route('provinsi.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
