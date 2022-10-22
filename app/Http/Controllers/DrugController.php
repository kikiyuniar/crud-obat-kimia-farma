<?php

namespace App\Http\Controllers;

use App\Models\drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function listDrugs(Request $request)
    {
        $data['data'] = drug::all();
        return view('content.drugs',$data);
    }

    public function formaddDrugs(Request $request)
    {
        return view('content.form-add-drugs');
    }

    public function addDrugs(Request $request)
    {
        $this->validate($request, [
            'name_obat'         => 'required',
            'images_obat'       => 'mimes:jpeg,jpg,png|required|max:2048',
            'tgl_dibuat'        => 'required',
            'tgl_kadaluarsa'    => 'required'
        ],
        [
            'name_obat.required'        => 'Kolom nama wajib diisi',
            'images_obat.required'      => 'Gambar wajib diisi',
            'images_obat.mimes'         => 'Gambar hanya bisa format (jpeg,jpg,png ',
            'images_obat.max'           => 'Gambar maksimal 2MB',
            'tgl_dibuat.required'       => 'Kolom tanggal dibuat wajib diisi',
            'tgl_kadaluarsa.required'   => 'Kolom tanggal kadaluarsa wajib diisi',
        ]);

        $nameFileOriginal   = $request->file('images_obat')->getClientOriginalName();
        $defaultName        = $nameFileOriginal;
        $request->file->move(public_path('Foto Obat'), $defaultName);

        $tambah = new drug();
        $tambah->name_obat      = $request->name_obat;
        $tambah->id_user        = $request->id_user;
        $tambah->images_obat    = $defaultName;
        $tambah->tgl_dibuat     = $request->tgl_dibuat;
        $tambah->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $tambah->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data berhasil mengirim pengajuan',
        // ]);

        return redirect()->back();
    }
}
