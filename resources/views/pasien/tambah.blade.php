@extends('layout')

@section('konten')

<h4>Tambah Pasien</h4>

@if ($errors->any())
            <div class="pt-3">
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $item)
                      <li>{{ $item }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
        @endif

<form action="{{ route('pasien.submit') }}" method="POST">
    @csrf
    <label for="">Id pasien</label>
    <input type="number" name="idpasien" class="form-control" placeholder="Input Id pasien" value="{{ Session::get('npm') }}">
    <label for="">Nama</label>
    <input type="text" name="nama" class="form-control" placeholder="Input Nama" value="{{ Session::get('npm') }}">
    <label for="">Penyakit</label>
    <input type="text" name="penyakit" class="form-control" placeholder="Input Nama Penyakit" value="{{ Session::get('npm') }}">
    <label for="">Jenis Kelamin Pasien</label>
              <select name="jk" id="" class="form-select">
                <option>L</option>
                <option>P</option>
              </select>
    <label for="">Alamat</label>
    <input type="text" name="alamat" class="form-control" placeholder="Input Alamat" value="{{ Session::get('npm') }}">


    <button class="btn btn-success">Tambah</button>
@endsection