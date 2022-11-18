<?php

namespace App\Http\Controllers;

use App\Models\DetailLoker;
use App\Models\Jurusan;
use App\Models\KategoriPekerjaan;
use App\Models\LowonganKerja;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LowonganKerjaController extends Controller
{
    public function index(){
        return view('lowongan_kerja.index');
    }

    public function listLoker(){
        $loker = LowonganKerja::with('perusahaan','bidangs')->get();
        return response()->json([
            'massage' => 'List Perusahaan',
            'data' => $loker
        ]);  
    }

    public function create(){
        $bidang = Jurusan::all();
        $perusahaan = Perusahaan::all();
        $kategori = KategoriPekerjaan::all();
        $linkloker = "loker";
        return view('lowongan_kerja.create',compact('bidang','perusahaan','kategori','linkloker'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_lowongan' => 'required',
            'id_perusahaan' => 'required|numeric',
            'bidang' => 'required|numeric',
            'status' => 'required',
            'salary' => 'required|numeric|min:0',
            'kategori' => 'required|min:1',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'syarat' => 'required',
        ],[
            'nama_lowongan.required' => 'Nama Lowongan Harus Diisi',
            'id_perusahaan.required' => 'Perusahaan Harus Terpilih',
            'bidang.required' => 'Bidang Harus Terpilih',
            'status.required' => 'Status Harus Terpilih',
            'salary.required' => 'Salary Harus Diisi',
            'kategori.required' => 'Kategori Pekerjaan Harus Terpilih',
            'alamat.required' => 'Alamat Harus Diisi',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
            'syarat.required' => 'Syarat Harus Diisi',
        ]);
        
        $data = [
            'nama_lowongan' => $request->nama_lowongan,
            'id_perusahaan' => $request->id_perusahaan,
            'bidang' => $request->bidang,
            'status' => $request->status,
            'salary' => $request->salary,
            'alamat' => $request->alamat,
            'deskripsi_lowongan' => $request->deskripsi,
            'syarat' => $request->syarat,
        ];

        $loker = new LowonganKerja();
        $createdLoker = $loker->create(array_merge($data));

        foreach($request->kategori as $kategori){
            $detailLoker = new DetailLoker();
            $detailLoker->create([
                'id_loker' => $createdLoker->id,
                'id_kategori' => $kategori
            ]);
        }

        return back()->with('success','Lowongan Kerja Telah Tersimpan!');

    }

    public function show($id){
        $loker = LowonganKerja::with('detailLoker','bidangs')->findOrFail($id);
        $detailLoker = DetailLoker::with('lowonganKerja')->where('id_loker','=',$id)->get();
        $bidang = Jurusan::all();
        $perusahaan = Perusahaan::all();
        $kategori = KategoriPekerjaan::all();
        return view('lowongan_kerja.show',compact('bidang','perusahaan','kategori','loker','detailLoker'));
    }

    public function edit($id){
        $loker = LowonganKerja::with('detailLoker')->findOrFail($id);
        $detailLoker = DetailLoker::with('lowonganKerja')->where('id_loker','=',$id)->get();
        $bidang = Jurusan::all();
        $perusahaan = Perusahaan::all();
        $kategori = KategoriPekerjaan::all();
        return view('lowongan_kerja.edit',compact('bidang','perusahaan','kategori','loker','detailLoker'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_lowongan' => 'required',
            'id_perusahaan' => 'required|numeric',
            'bidang' => 'required|numeric',
            'status' => 'required',
            'salary' => 'required|numeric|min:0',
            'kategori' => 'required|min:1',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'syarat' => 'required',
            'det' => 'required'
        ],[
            'nama_lowongan.required' => 'Nama Lowongan Harus Diisi',
            'id_perusahaan.required' => 'Perusahaan Harus Terpilih',
            'bidang.required' => 'Bidang Harus Terpilih',
            'status.required' => 'Status Harus Terpilih',
            'salary.required' => 'Salary Harus Diisi',
            'kategori.required' => 'Kategori Pekerjaan Harus Terpilih',
            'alamat.required' => 'Alamat Harus Diisi',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
            'syarat.required' => 'Syarat Harus Diisi',
        ]);
        
        $data = [
            'nama_lowongan' => $request->nama_lowongan,
            'id_perusahaan' => $request->id_perusahaan,
            'bidang' => $request->bidang,
            'status' => $request->status,
            'salary' => $request->salary,
            'alamat' => $request->alamat,
            'deskripsi_lowongan' => $request->deskripsi,
            'syarat' => $request->syarat,
        ];
        $loker = LowonganKerja::with('detailLoker')->findOrFail($id);
        $loker->update(array_merge($data));
        $loker->refresh();

        foreach($request->det as $id){
            DetailLoker::find($id)->delete();
        }

        foreach($request->kategori as $kategori){
            $detailLoker = new DetailLoker();
            $detailLoker->create([
                'id_loker' => $loker->id,
                'id_kategori' => $kategori
            ]);
        }

        return back()->with('success','Lowongan Kerja Berhasil Diubah!');
    }

    public function destroy($id){
        $loker = LowonganKerja::findOrFail($id);
        $loker->findOrFail($loker->id)->delete($loker);
        return response()->json([
            'message' => 'Lowongan Kerja berhasil dihapus!'
        ]);
    }
}
