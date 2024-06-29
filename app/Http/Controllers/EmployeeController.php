<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $data = Employee::all();
        return view('datapegawai',compact('data'));
    }

    public function tambahpegawai(){
 
        return view('tambahdata');
    }

    public function insertdata(Request $request){


        $request->validate([
            'nama' => 'required',
            'jeniskelamin' => 'required|in:L,P',
            'notelpon' => 'required|numeric',
        ],
    [
        'nama.required' => 'Nama harus diisi',
        'jeniskelamin.required' => 'Jenis Kelamin harus diisi',
        'jeniskelamin.in' => 'Jenis Kelamin belum dipilih',
        'notelpon.required' => 'No telpon harus diisi',
        'notelpon.numeric' => 'No Telpon harus berupa angka'
    ]);
        $data = Employee::create($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Tambahkan');
    }


    public function tampilkandata($id){
        $data = Employee::find($id);
        return view('tampildata', compact('data'));

    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->to('pegawai')->with('success','Data Berhasil Di Update');
    }

    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Hapus');
    }
}
