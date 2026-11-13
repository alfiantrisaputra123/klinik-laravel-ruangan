@extends('layouts.klinik')

@section('title', 'Edit Ruangan')

@section('content')
    <section class="intro">
      <h2>Edit Ruangan</h2>
      <p>Ubah data ruangan poliklinik, lalu simpan.</p>
    </section>

    <form class="form-card" action="{{ route('ruangan.update', $ruangan->id) }}" method="POST">
      @csrf
      @method('PUT')
      @include('ruangan._form')
    </form>
@endsection
