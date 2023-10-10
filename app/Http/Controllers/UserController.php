<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{   
    public function dashboard(){
        $data = User::all();
        return view('welcome', compact('data'));
    }

    public function index(Request $request){
        if ($request->has('search')) {
            $data = User::where('fullname', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = User::paginate(5);
        }
        return view('datauser', compact('data'));
    }

   
    public function tambahdatauser(){
        return view('tambahdatauser');
    }

    public function insertdatauser(Request $request){
        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'fullname' => $request->fullname,
            'remember_token' => Str::random(60),
            'is_active' => '0',
        ]);
        return redirect()->route('manajemenuser')->with('success', 'Data berhasil ditambahkan');
    }

    public function tampildatauser($id){
        $data = User::find($id);
        //dd($data);
        return view('tampildatauser', compact('data'));
    }

    public function updatedatauser(Request $request, $id){
        $data = User::find($id);
        $data->update([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'fullname' => $request->fullname,
            'remember_token' => Str::random(60),
            'is_active' => $request->is_active,
        ]);
        return redirect()->route('manajemenuser')->with('success', 'Data berhasil diupdate');
    }
    public function deletedatauser($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('manajemenuser')->with('success', 'Data berhasil dihapus');
    }
}
