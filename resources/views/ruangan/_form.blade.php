{{-- Form yang dipakai bersama oleh halaman create dan edit.
     Di halaman create, variabel $ruangan tidak ada, makanya dipakai "?? ''" --}}

<div class="form-group">
  <label for="kode">Kode Ruangan</label>
  <input type="text" id="kode" name="kode" placeholder="contoh: R-05"
         value="{{ old('kode', $ruangan->kode ?? '') }}">
  @error('kode') <small class="error-text">{{ $message }}</small> @enderror
</div>

<div class="form-group">
  <label for="nama_ruangan">Nama Ruangan</label>
  <input type="text" id="nama_ruangan" name="nama_ruangan" placeholder="contoh: Ruang Poli Mata"
         value="{{ old('nama_ruangan', $ruangan->nama_ruangan ?? '') }}">
  @error('nama_ruangan') <small class="error-text">{{ $message }}</small> @enderror
</div>

<div class="form-group">
  <label for="jenis_poli">Jenis Poli</label>
  <input type="text" id="jenis_poli" name="jenis_poli" list="daftar-poli" placeholder="pilih atau ketik sendiri"
         value="{{ old('jenis_poli', $ruangan->jenis_poli ?? '') }}">
  <datalist id="daftar-poli">
    <option value="Poli Umum">
    <option value="Poli Gigi">
    <option value="Poli Anak">
    <option value="Poli Mata">
    <option value="Poli Kandungan">
  </datalist>
  @error('jenis_poli') <small class="error-text">{{ $message }}</small> @enderror
</div>

<div class="form-group">
  <label for="lokasi_gedung">Lokasi Gedung</label>
  <input type="text" id="lokasi_gedung" name="lokasi_gedung" placeholder="contoh: Gedung A, Lantai 1"
         value="{{ old('lokasi_gedung', $ruangan->lokasi_gedung ?? '') }}">
  @error('lokasi_gedung') <small class="error-text">{{ $message }}</small> @enderror
</div>

<div class="form-group">
  <label for="status">Status</label>
  <select id="status" name="status">
    @foreach (['Tersedia', 'Terpakai', 'Maintenance'] as $s)
      <option value="{{ $s }}" {{ old('status', $ruangan->status ?? 'Tersedia') == $s ? 'selected' : '' }}>{{ $s }}</option>
    @endforeach
  </select>
  @error('status') <small class="error-text">{{ $message }}</small> @enderror
</div>

<div class="form-aksi">
  <button type="submit" class="btn-kecil tambah">Simpan</button>
  <a href="{{ route('ruangan.index') }}" class="btn-kecil abu">Batal</a>
</div>
