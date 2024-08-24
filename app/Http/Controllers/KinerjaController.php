<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KinerjaController extends Controller
{
    public function predikat_kinerja($hasil_kerja, $perilaku)
    {
        $matrix = [
            'dibawah ekspektasi' => [
                'dibawah ekspektasi' => 'Sangat Kurang',
                'sesuai ekspektasi'  => 'Kurang/Misconduct',
                'diatas ekspektasi'  => 'Kurang/Misconduct',
            ],
            'sesuai ekspektasi' => [
                'dibawah ekspektasi' => 'Butuh Perbaikan',
                'sesuai ekspektasi'  => 'Baik',
                'diatas ekspektasi'  => 'Baik',
            ],
            'diatas ekspektasi' => [
                'dibawah ekspektasi' => 'Butuh Perbaikan',
                'sesuai ekspektasi'  => 'Baik',
                'diatas ekspektasi'  => 'Sangat Baik',
            ],
        ];

        return $matrix[$perilaku][$hasil_kerja] ?? 'Belum Diketahui';
    }

    public function showPredikatKinerja(Request $request)
    {
        $hasil_kerja = $request->input('hasil_kerja');
        $perilaku = $request->input('perilaku');

        $predikat = $this->predikat_kinerja($hasil_kerja, $perilaku);

        return view('predikat_kinerja', ['predikat' => $predikat]);
    }
}
