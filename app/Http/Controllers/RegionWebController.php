<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionWebController extends Controller
{

    public function index(Request $request)
    {
        $query = Region::whereRaw("LENGTH(kode) = 2");

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($query) use ($search) {
                $query->where('kode', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%");
            });
        }

        $provinsi = $query->get();

        return view('provinsi.index', compact('provinsi'));
    }


    public function create()
    {
        return view('provinsi.create');
    }

    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'kode' => 'required|string|size:2|unique:wilayah',
            'nama' => 'required|string|max:255',
        ]);

        Region::create($validated); //simpan data

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan');
    }


    public function show($kode)
    {
        $provinsi = Region::findOrFail($kode);
        return view('provinsi.show', compact('provinsi'));
    }


    public function edit($kode)
    {
        $provinsi = Region::findOrFail($kode);
        return view('provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $kode)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $provinsi = Region::findOrFail($kode);
        $provinsi->update($request->all());

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diupdate');
    }

    public function destroy($kode)
    {
        $region = Region::where('kode', $kode)->first();

        if ($region) {
            $region->delete();
            return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus');
        } else {
            return redirect()->route('provinsi.index')->with('error', 'Provinsi tidak ditemukan');
        }
    }
}
