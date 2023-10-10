<?php

namespace App\Http\Controllers;

use App\Models\Tb_jenis_obat;
use Illuminate\Http\Request;

class TbJenisObatController extends Controller
{
    public function index(Request $request){
        if ($request->has('search')) {
            $data = Tb_jenis_obat::where('nama_jenis_obat', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Tb_jenis_obat::paginate(5);
        }
        return view('datajenisobat', compact('data'));
    }

    public function tambahjenisobat(){
        return view('tambahjenisobat');
    }
    public function insertjenisobat(Request $request){
        Tb_jenis_obat::create([
            'nama_jenis_obat' => $request->nama_jenis_obat
        ]);
        return redirect()->route('manajemenjenisobat')->with('success', 'Data berhasil ditambahkan');
    }
    public function tampiljenisobat($id){
        $data = Tb_jenis_obat::find($id);
        return view('tampiljenisobat', compact('data'));
    }
    public function updatejenisobat(Request $request, $id){
        $data = Tb_jenis_obat::find($id);
        $data->update([
            'nama_jenis_obat' => $request->nama_jenis_obat,
        ]);
        return redirect()->route('manajemenjenisobat')->with('success', 'Data berhasil diupdate');
    }
    public function deletejenisobat($id){
        $data = Tb_jenis_obat::find($id);
        $data->delete();
        return redirect()->route('manajemenjenisobat')->with('success', 'Data berhasil dihapus');
    }
}
