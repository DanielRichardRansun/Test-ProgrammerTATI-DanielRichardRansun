<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Tambah Provinsi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('provinsi.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nama">Nama Provinsi</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="kode">Kode Provinsi</label>
                        <input type="text" name="kode" id="kode" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    <a href="{{ route('provinsi.index') }}" class="btn btn-secondary mt-3">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
