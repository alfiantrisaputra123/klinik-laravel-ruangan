<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title') | Klinik Rawat Jalan</title>
<link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

  <header class="site-header">
    <h1>Sistem Informasi Klinik Rawat Jalan</h1>
    <p>Modul: Manajemen Ruang Poliklinik</p>
  </header>

  <nav class="navbar">
    <a href="{{ route('ruangan.index') }}" class="active">Daftar Ruangan</a>

    {{-- @auth = tampil kalau sudah login, @else = tampil kalau belum login --}}
    @auth
      <span class="user-info">Halo, {{ Auth::user()->name }}</span>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-kecil hapus">Logout</button>
      </form>
    @else
      <a href="{{ route('login') }}">Login</a>
    @endauth
  </nav>

  <main>
    {{-- Pesan sukses setelah tambah / ubah / hapus --}}
    @if (session('success'))
      <div class="alert">{{ session('success') }}</div>
    @endif

    @yield('content')
  </main>

  <footer class="site-footer">
    <p><strong>Nama:</strong> Alfian Tri Saputra | <strong>NIM:</strong> 102022500326 | <strong>Kelas:</strong> SI4907</p>
    <p><strong>Kelompok:</strong> Kelompok 2 | <strong>Modul:</strong> Ruang Poliklinik</p>
  </footer>

</body>
</html>
