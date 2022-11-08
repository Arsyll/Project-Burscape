<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Dokumen::all();
        return view('dokumen.index', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name_doc' => 'required',
            'no_doc' => 'required',
            'type_doc' => 'required',
            'file_doc' => 'required|file'
        ]);

        $loker_id = ['id_loker' => $request->id_loker ? $request->id_loker : ''];
        $perusahaan_id = ['id_perusahaan' => $request->id_perusahaan ? $request->id_perusahaan : ''];
        if($request->hasFile('file_doc')){
            $newname = $request->name_doc.' '.date("ymdhis").'.'.$request->file('file_doc')->getClientOriginalExtension();
            $request->file('file_doc')->storeAs('doc_folder', $newname);
        }
        $file_doc = ['file_doc' => $newname];
        $dokumen = new Dokumen();
        $status = $dokumen->create(array_merge($input,$loker_id,$file_doc,$perusahaan_id));

        return response()->json([
            'code' => 200,
            'message' => 'Dokumen berhasil ditambah!',
            'data' => $status
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'message' => 'detail dokumen!',
            'data' => Dokumen::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name_doc' => 'required',
            'no_doc' => 'required',
            'type_doc' => 'required',
            'file_doc' => 'required|file'
        ]);

        $dokumen = Dokumen::findOrFail($id);
        $oldFile = $dokumen->file_doc;
        $path = 'storage/public/'.$oldFile;
            if (File::exists($path)) 
            {
                File::delete($path);
            }

        $loker_id = ['id_loker' => $request->id_loker ? $request->id_loker : ''];
        $perusahaan_id = ['id_perusahaan' => $request->id_perusahaan ? $request->id_perusahaan : ''];
        if($request->hasFile('file_doc')){
            $newname = $request->name_doc.' '.date("ymdhis").'.'.$request->file('file_doc')->getClientOriginalExtension();
            $request->file('file_doc')->move('storage/doc_folder/', $newname);
        }
        $file_doc = ['file_doc' => $newname];
        $status = $dokumen->update(array_merge($input,$loker_id,$file_doc,$perusahaan_id));

        return response()->json([
            'code' => 200,
            'message' => 'Dokumen berhasil diedit!',
            'data' => $status
        ]);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $oldFile = $dokumen->file_doc;
        $path = storage_path('app/doc_folder/'.$oldFile);
        if (File::exists($path)) 
        {
            File::delete($path);
        }
        $dokumen->findOrFail($dokumen->id)->delete($dokumen);
        return response()->json([
            'message' => 'Dokumen berhasil dihapus!'
        ]);
    }

    public function listDokumen(Request $request){
        return response()->json([
            'massage' => 'List Jurusan',
            'data' => Dokumen::where("name_doc","like","%".$request->search."%")->get()
        ]);    
        
        
    }

    public function search(){

    }

    public function download($id){
        // dd($id);
        $dokumen = Dokumen::where('id','=',$id)->first();
        // dd($dokumen);
        $file = storage_path('app/doc_folder/'.$dokumen->file_doc);
        return response()->download($file);
    }
}
