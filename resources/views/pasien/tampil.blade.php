@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List pasien</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('pasien.tambah') }}">Tambah Pasien</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
      @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully</strong> {{ Session::get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
    </div>
</div>

<table class="table">
    <tr>
        <th>No</th>
        <th>Id Pasien</th>
        <th>Nama</th>
        <th>Penyakit</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    @foreach ($pasien as $no=>$data) 
     <tr>
        <td>{{ $no+1 }}</td>
        <td>{{ $data->idpasien }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->penyakit }}</td>
        <td>{{ $data->jk }}</td>
        <td>{{ $data->alamat }}</td>
        <td>
            <a href="{{ route('pasien.edit', $data->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('pasien.delete', $data->id) }}" method="post">
            @csrf
            <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach 
</table>

@endsection