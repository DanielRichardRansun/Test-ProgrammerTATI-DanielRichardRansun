<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Cek Predikat Kinerja') }}
        </h2>
    </x-slot>

    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="bg-white p-4 rounded shadow w-100" style="max-width: 600px;">
            <form action="/predikat" method="get">
                <div class="mb-3">
                    <label for="hasil_kerja" class="form-label">Hasil Kerja:</label>
                    <select name="hasil_kerja" id="hasil_kerja" class="form-select">
                        <option value="dibawah ekspektasi" {{ request('hasil_kerja') == 'dibawah ekspektasi' ? 'selected' : '' }}>Dibawah Ekspektasi</option>
                        <option value="sesuai ekspektasi" {{ request('hasil_kerja') == 'sesuai ekspektasi' ? 'selected' : '' }}>Sesuai Ekspektasi</option>
                        <option value="diatas ekspektasi" {{ request('hasil_kerja') == 'diatas ekspektasi' ? 'selected' : '' }}>Diatas Ekspektasi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="perilaku" class="form-label">Perilaku:</label>
                    <select name="perilaku" id="perilaku" class="form-select">
                        <option value="dibawah ekspektasi" {{ request('perilaku') == 'dibawah ekspektasi' ? 'selected' : '' }}>Dibawah Ekspektasi</option>
                        <option value="sesuai ekspektasi" {{ request('perilaku') == 'sesuai ekspektasi' ? 'selected' : '' }}>Sesuai Ekspektasi</option>
                        <option value="diatas ekspektasi" {{ request('perilaku') == 'diatas ekspektasi' ? 'selected' : '' }}>Diatas Ekspektasi</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Cek Predikat</button>
                </div>
            </form>

            @if(isset($predikat))
                <div class="mt-4 mb-3">
                    <div class="d-flex justify-content-between">
                        <div class="w-50 p-3 border rounded bg-light">
                            <p><strong>Hasil Kerja:</strong> {{ ucfirst(request('hasil_kerja')) }}</p>
                        </div>
                        <div class="w-50 p-3 border rounded bg-light">
                            <p><strong>Perilaku:</strong> {{ ucfirst(request('perilaku')) }}</p>
                        </div>
                    </div>
                </div>

                @php
                    $bgColor = 'bg-light';
                    $textColor = 'text-dark';

                    switch ($predikat) {
                        case 'Sangat Kurang':
                            $bgColor = 'bg-danger text-white';
                            break;
                        case 'Kurang/Misconduct':
                        case 'Butuh Perbaikan':
                            $bgColor = 'bg-warning text-dark';
                            break;
                        case 'Baik':
                            $bgColor = 'bg-success text-white';
                            break;
                        case 'Sangat Baik':
                            $bgColor = 'bg-success text-white';
                            break;
                    }
                @endphp

                <div class="p-3 rounded {{ $bgColor }} {{ $textColor }} text-center">
                    <h4 class="fw-bold">Predikat:</h4>
                    <h2 class="h2 fw-bold">{{ $predikat }}</h2>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
