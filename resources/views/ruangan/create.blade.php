@extends('layouts.klinik')

@section('title', 'Tambah Ruangan')

@section('content')
    <section class="intro">
      <h2>Tambah Ruangan</h2>
      <p>Isi data ruangan poliklinik dengan lengkap.</p>
    </section>

    <form class="form-card" action="{{ route('ruangan.store') }}" method="POST">
      @csrf
      @include('ruangan._form')
    </form>
@endsection
