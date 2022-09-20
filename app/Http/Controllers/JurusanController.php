<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index(){
        $data['jurusan'] = Jurusan::orderBy('nama_jurusan','asc')->get();
        return view('table_master.jurusan.index', $data);
        // $data['produk']=DB::table('t_produk')->orderBy('nama')->get();
        // $data['produk'] = Produk::orderBy('nama','asc')->get();

    }
    public function isi(){
        return response()->json([
            'massage' => 'List Jurusan',
            'data' => Jurusan::all()
        ]);
    }

    public function store(Request $request){
        $rule = [
            'nama_jurusan' => 'required|unique:jurusan',
        ];
        $this->validate($request, $rule);

        $input = $request->all();

        $status = Jurusan::create($input);

        return response()->json([
            'code' => 200,
            'message' => 'Jurusan berhasi ditambah!',
            'data' => $status
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'message' => 'detail jurusan!',
            'data' => Jurusan::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id){
        $rule = [
            'jurusan' => 'required'
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        // unset($input['_token']);
        // unset($input['_method']);
        // $status = DB::table('t_produk')->where('id', $id)->update($input);

        $jurusan = Jurusan::find($id);
        $status = $jurusan->update($input);

        return response()->json([
            'code' => 200,
            'message' => 'Jurusan berhasil diubah!',
            'data' => $status
        ]);
    }
    public function destroy(Jurusan $jurusan){
        $jurusan->findOrFail($jurusan->id)->delete($jurusan);
        return response()->json([
            'message' => 'Jurusan berhasil dihapus!'
        ]);
    }
}

