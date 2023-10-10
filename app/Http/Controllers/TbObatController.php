<?php

namespace App\Http\Controllers;

use App\Models\Tb_obat;
use App\Models\Tb_jenis_obat;
use Illuminate\Http\Request;

class TbObatController extends Controller
{
    public function index(Request $request){
        if ($request->has('search')) {
            $data = Tb_obat::where('nama_obat', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Tb_obat::paginate(5);
        }
        return view('dataobat', compact('data'));
    }

    public function tambahobat(){
        $data = Tb_jenis_obat::all();
        return view('tambahobat', compact('data'));
    }
}
