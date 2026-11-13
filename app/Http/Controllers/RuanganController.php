<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    // READ: tampilkan semua data ruangan
    public function index()
    {
        $daftarRuangan = Ruangan::orderBy('kode')->get();

        return view('ruangan.index', compact('daftarRuangan'));
    }

    // CREATE (bagian 1): tampilkan form tambah
    public function create()
    {
        //return view ruangan.create
        return view ('ruangan.create');
    }

    // CREATE (bagian 2): validasi lalu simpan data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'          => 'required|max:10|unique:ruangan,kode',
            'nama_ruangan'  => 'required|max:100',
            'jenis_poli'    => 'required|max:50',
            'lokasi_gedung' => 'required|max:100',
            'status'        => 'required|in:Tersedia,Terpakai,Maintenance',
        ]);

        Ruangan::create($data);

        return redirect()->route('ruangan.index')
                         ->with('success', 'Data ruangan berhasil ditambahkan.');
    }

    // UPDATE (bagian 1): tampilkan form edit berisi data lama
    public function edit(Ruangan $ruangan)
    {
        return view('ruangan.edit', compact('ruangan'));
    }

    // UPDATE (bagian 2): validasi lalu simpan perubahan
    public function update(Request $request, Ruangan $ruangan)
    {
        $data = $request->validate([
            'kode'          => 'required|max:10|unique:ruangan,kode,' . $ruangan->id,
            'nama_ruangan'  => 'required|max:100',
            'jenis_poli'    => 'required|max:50',
            'lokasi_gedung' => 'required|max:100',
            'status'        => 'required|in:Tersedia,Terpakai,Maintenance',
        ]);

        $ruangan->update($data);

        return redirect()->route('ruangan.index')
                         ->with('success', 'Data ruangan berhasil diubah.');
    }

    // DELETE: hapus data
    public function destroy(Ruangan $ruangan)
    {
        //$ruangan delete
        $ruangan->delete();
        return redirect()->route('ruangan.index')
                         ->with('success', 'Data ruangan berhasil dihapus.');
    }
}
