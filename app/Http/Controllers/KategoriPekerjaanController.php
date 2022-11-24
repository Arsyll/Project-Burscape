<?php

namespace App\Http\Controllers;

use App\Models\KategoriPekerjaan;
use Illuminate\Http\Request;

class KategoriPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data['kategori_pekerjaan'] = KategoriPekerjaan::orderBy('nama_kategori','asc')->get();
        return view('table_master.kategori_pekerjaan.index', $data);

    }
    public function isi(){
        return response()->json([
            'massage' => 'List KategoriPekerjaan',
            'data' => KategoriPekerjaan::all()
        ]);
    }

    public function store(Request $request){
        $rule = [
            'nama_kategori' => 'required|unique:kategori_pekerjaan',
        ];
        $this->validate($request, $rule);

        $input = $request->all();

        $status = KategoriPekerjaan::create($input);

        return response()->json([
            'code' => 200,
            'message' => 'KategoriPekerjaan berhasi ditambah!',
            'data' => $status
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'message' => 'detail kategori_pekerjaan!',
            'data' => KategoriPekerjaan::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id){
        $kategori_pekerjaan = KategoriPekerjaan::find($id);
        $rule = [
            'nama_kategori' => 'required|unique:kategori_pekerjaan,nama_kategori,'. $kategori_pekerjaan->id 
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        // unset($input['_token']);
        // unset($input['_method']);
        // $status = DB::table('t_produk')->where('id', $id)->update($input);

        $status = $kategori_pekerjaan->update($input);

        return response()->json([
            'code' => 200,
            'message' => 'KategoriPekerjaan berhasil diubah!',
            'data' => $status
        ]);
    }
    public function destroy($kp){
        KategoriPekerjaan::findOrFail($kp)->delete();
        return response()->json([
            'message' => 'Kategori Pekerjaan berhasil dihapus!'
        ]);
    }
}
