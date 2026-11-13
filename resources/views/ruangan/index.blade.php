@extends('layouts.klinik')

@section('title', 'Daftar Ruangan')

@section('content')
    <section class="intro">
      <h2>Daftar Ruang Poliklinik</h2>
      <p>Kelola data master ruang poliklinik: nama ruangan, lokasi gedung, dan status ketersediaannya.</p>
    </section>

    {{-- @can: tombol hanya muncul kalau user boleh (lihat RuanganPolicy) --}}
    @can('create', \App\Models\Ruangan::class)
      <div class="toolbar">
        <a href="{{ route('ruangan.create') }}" class="btn-kecil tambah">+ Tambah Ruangan</a>
      </div>
    @endcan

    <section class="table-section">
      <table>
        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama Ruangan</th>
            <th>Jenis Poli</th>
            <th>Lokasi Gedung</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($daftarRuangan as $r)
            <tr>
              <td>{{ $r->kode }}</td>
              <td>{{ $r->nama_ruangan }}</td>
              <td>{{ $r->jenis_poli }}</td>
              <td>{{ $r->lokasi_gedung }}</td>
              <td><span class="badge {{ strtolower($r->status) }}">{{ $r->status }}</span></td>
              <td class="aksi">
                @can('update', $r)
                  <a href="{{ route('ruangan.edit', $r->id) }}" class="btn-kecil edit">Edit</a>
                @endcan

                {{-- Tombol Hapus disembunyikan untuk petugas, hanya admin yang melihatnya --}}
                @can('delete', $r)
                  <form action="{{ route('ruangan.destroy', $r->id) }}" method="POST"
                        onsubmit="return confirm('Hapus ruangan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-kecil hapus">Hapus</button>
                  </form>
                @endcan
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="kosong">Belum ada data ruangan.</td></tr>
          @endforelse
        </tbody>
      </table>
    </section>
@endsection
