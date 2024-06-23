<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    //
    function tampil(){
        $pasien = pasien::get();
        return view('pasien.tampil', compact('pasien'));
    }
    function tambah(){
        return view('pasien.tambah');
        
    }
    function submit(Request $request){

        Session::flash('idpasien', $request->idpasien);
        Session::flash('nama', $request->nama);
        Session::flash('penyakit', $request->penyakit);
        Session::flash('alamat', $request->alamat);

        $request->validate(
            [
                'idpasien' => 'required|numeric|unique:pasien,idpasien',
                'nama' => 'required',
                'penyakit' => 'required',
                'jk' => 'required',
                'alamat' => 'required'
            ],
            [
                'idpasien.required' => 'idpasien tidak boleh kosong!',
                'idpasien.numeric' => 'idpasien harus diisi dalam bentuk angka',
                'idpasien.unique' => 'idpasien sudah ada sebelumnya',
                'nama.required' => 'Nama Pasien tidak boleh kosong!',
                'penyakit.required' => 'Penyakit tidak boleh kosong!',
                'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
                'alamat.required' => 'Alamat tidak boleh kosong!'
            ]
            );

        $pasien = new pasien();
        $pasien->idpasien = $request->idpasien;
        $pasien->nama = $request->nama;
        $pasien->penyakit = $request->penyakit;
        $pasien->jk = $request->jk;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        return redirect()->route('pasien.tampil')->with('success', 'Data Berhasil ditambahkan!');
        
    }
    function edit($id) {
        $pasien = pasien::find($id);
        return view('pasien.edit', compact('pasien'));
    }

    function update(Request $request, $id){

        Session::flash('idpasien', $request->idpasien);
        Session::flash('nama', $request->nama);
        Session::flash('penyakit', $request->penyakit);
        Session::flash('alamat', $request->alamat);

        $request->validate(
            [
                'idpasien' => 'required|numeric|unique:pasien,idpasien',
                'nama' => 'required',
                'penyakit' => 'required',
                'jk' => 'required',
                'alamat' => 'required'
            ],
            [
                'idpasien.required' => 'id pasien tidak boleh kosong!',
                'idpasien.numeric' => 'id pasien harus diisi dalam bentuk angka',
                'idpasien.unique' => 'id pasien sudah ada sebelumnya',
                'nama.required' => 'Nama Pasien tidak boleh kosong!',
                'penyakit.required' => 'Penyakit tidak boleh kosong!',
                'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
                'alamat.required' => 'Alamat tidak boleh kosong!'
            ]
            );
        $pasien = pasien::find($id);
        $pasien->idpasien = $request->idpasien;
        $pasien->nama = $request->nama;
        $pasien->penyakit = $request->penyakit;
        $pasien->jk = $request->jk;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        return redirect()->route('pasien.tampil')->with('success', 'Data Berhasil diEdit!');
    }

    function delete($id) {
        $pasien = pasien::find($id);
        $pasien->delete();
        return redirect()->route('pasien.tampil')->with('success', 'Data Berhasil diHapus!'); 
    }
}
