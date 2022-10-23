<?php

namespace App\Http\Controllers;

use App\Models\drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class DrugController extends Controller
{
    public function dashboard()
    {
        return view('content.dashboard');
    }
    public function listDrugs(Request $request)
    {
        $data['data'] = drug::with(['user'])->orderBy('id', 'desc')->get();
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
        $request->images_obat->move(public_path('Foto Obat'), $defaultName);

        $tambah = new drug();
        $tambah->name_obat      = $request->name_obat;
        $tambah->id_user        = $request->id_user;
        $tambah->images_obat    = $defaultName;
        $tambah->tgl_dibuat     = $request->tgl_dibuat;
        $tambah->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $tambah->save();

        return redirect('drugs');
    }

    public function viewDrugs(Request $request)
    {
        $decript        = Crypt::decrypt($request->id);
        $data['data']   = drug::with(['user'])->where('id',$decript)->first();
        return view('content.detail-drugs',$data);
    }
    
    public function vieweditDrugs(Request $request)
    {
        $decript        = Crypt::decrypt($request->id);
        $data['data']   = drug::with(['user'])->where('id',$decript)->first();
        return view('content.form-edit-drugs',$data);
    }

    public function actioneditDrugs(Request $request)
    {
        $data = drug::where('id',$request->id)->first();
        if ($request->file('images_obat')) {
            $this->validate($request, [
                'name_obat'         => 'required',
                'images_obat'       => 'mimes:jpeg,jpg,png|max:2048',
                'tgl_dibuat'        => 'required',
                'tgl_kadaluarsa'    => 'required'
            ],
            [
                'name_obat.required'        => 'Kolom nama wajib diisi',
                'images_obat.mimes'         => 'Gambar hanya bisa format (jpeg,jpg,png ',
                'images_obat.max'           => 'Gambar maksimal 2MB',
                'tgl_dibuat.required'       => 'Kolom tanggal dibuat wajib diisi',
                'tgl_kadaluarsa.required'   => 'Kolom tanggal kadaluarsa wajib diisi',
            ]);
    
            $nameFileOriginal   = $request->file('images_obat')->getClientOriginalName();
            $defaultName        = $nameFileOriginal;
            $request->images_obat->move(public_path('Foto Obat'), $defaultName);
            File::delete(public_path('Foto Obat/' . $data->name_obat));
    
            drug::where('id', $request->id)
                ->update([
                    'name_obat'         => $request->name_obat,
                    'images_obat'       => $defaultName,
                    'tgl_dibuat'        => $request->tgl_dibuat,
                    'tgl_kadaluarsa'    => $request->tgl_kadaluarsa,
            ]);
        } else {
            $this->validate($request, [
                'name_obat'         => 'required',
                'tgl_dibuat'        => 'required',
                'tgl_kadaluarsa'    => 'required'
            ],
            [
                'name_obat.required'        => 'Kolom nama wajib diisi',
                'tgl_dibuat.required'       => 'Kolom tanggal dibuat wajib diisi',
                'tgl_kadaluarsa.required'   => 'Kolom tanggal kadaluarsa wajib diisi',
            ]);
    
            drug::where('id', $request->id)
                ->update([
                    'name_obat'         => $request->name_obat,
                    'tgl_dibuat'        => $request->tgl_dibuat,
                    'tgl_kadaluarsa'    => $request->tgl_kadaluarsa,
            ]);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $del = drug::find($id);
            if ($del) {
                $file = public_path('Foto Obat/' . $del->images_obat);

                if (File::exists($file)) {
                    File::delete($file);
                }

                $del->delete();
                // return redirect('drugs')->with('success', 'Product deleted successfully');
                return response()->json([
                    'success' => true,
                    'message' => 'Obat deleted successfully',
                ]);
            }
        } catch (\Throwable $th) {
            return redirect('drugs')->with('error', 'Barang cannot be deleted');
        }
    }
}
