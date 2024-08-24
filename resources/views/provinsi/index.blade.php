<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Daftar Provinsi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ route('provinsi.create') }}" class="btn btn-primary">Tambah Provinsi</a>
                
                    <form action="{{ route('provinsi.index') }}" method="GET" class="input-group" style="max-width: 400px;">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Cari kode atau nama provinsi" 
                            value="{{ request('search') }}" 
                            aria-label="Cari kode atau nama provinsi" 
                            aria-describedby="button-search"
                        >
                        <button class="btn btn-outline-primary" type="submit" id="button-search">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </form>
                </div>
                

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($provinsi->isEmpty())
                    <div class="alert alert-info">
                        Tidak ada data provinsi yang tersedia.
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Provinsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($provinsi as $item)
                                <tr>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <a href="{{ route('provinsi.show', $item->kode) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('provinsi.edit', $item->kode) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('provinsi.destroy', $item->kode) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus provinsi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
