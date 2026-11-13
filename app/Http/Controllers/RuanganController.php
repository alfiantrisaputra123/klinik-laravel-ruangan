<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RuanganController extends Controller
{
    // READ: tampilkan semua data ruangan
    public function index()
    {
        Gate::authorize('viewAny', Ruangan::class);

        $daftarRuangan = Ruangan::orderBy('kode')->get();

        return view('ruangan.index', compact('daftarRuangan'));
    }

    // CREATE (bagian 1): tampilkan form tambah
    public function create()
    {
        Gate::authorize('create', Ruangan::class);

        return view('ruangan.create');
    }

    // CREATE (bagian 2): validasi lalu simpan data baru
    public function store(Request $request)
    {
        Gate::authorize('create', Ruangan::class);

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
        Gate::authorize('update', $ruangan);

        return view('ruangan.edit', compact('ruangan'));
    }

    // UPDATE (bagian 2): validasi lalu simpan perubahan
    public function update(Request $request, Ruangan $ruangan)
    {
        Gate::authorize('update', $ruangan);

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

    // DELETE: hanya admin (dicek lagi lewat Policy sebagai lapisan kedua)
    public function destroy(Ruangan $ruangan)
    {
        Gate::authorize('delete', $ruangan);

        $ruangan->delete();

        return redirect()->route('ruangan.index')
                         ->with('success', 'Data ruangan berhasil dihapus.');
    }
}
