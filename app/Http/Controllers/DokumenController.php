<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

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
            'file_doc' => 'required|file|mimes:png,jpg,pdf,doc,docx,xlx,xlxs'
        ],[
            'name_doc.required' => 'Nama Dokumen Harus Diisi.',
            'no_doc.required' => 'No Dokumen Harus Diisi.',
            'type_doc.required' => 'Tipe Dokumen Harus Diisi.',
            'file_doc.required' => 'File Dokumen Harus Diisi.',
            'file_doc.required' => 'File Dokumen Harus Diisi.',
            'file_doc.file' => 'File Dokumen Harus Diisi.',
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
        ]);
        
        $dokumen = Dokumen::findOrFail($id);
        $loker_id = ['id_loker' => $request->id_loker ? $request->id_loker : ''];
        $perusahaan_id = ['id_perusahaan' => $request->id_perusahaan ? $request->id_perusahaan : ''];
        $oldFile = $dokumen->file_doc;
        $path = storage_path('app/doc_folder/'.$oldFile);
        if($request->hasFile('file_doc')){
            if (File::exists($path)) 
            {
                File::delete($path);
            }
            $newname = $request->name_doc.' '.date("ymdhis").'.'.$request->file('file_doc')->getClientOriginalExtension();
            $request->file('file_doc')->storeAs('doc_folder', $newname);
        }else{
            $pathinfo = pathinfo($path);
            $extension = $pathinfo['extension'];
            $newname = $request->name_doc.' '.date("ymdhis").'.'.$extension;
            rename($path,storage_path('app/doc_folder/'.$newname));
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
        $dokumen = Dokumen::with('perusahaan');
        return response()->json([
            'massage' => 'List Jurusan',
            'data' => DataTables::eloquent($dokumen)->addColumn('perusahaan', function (Dokumen $dokumen){return $dokumen->perusahaan->nama ?? '-';})->toJson()
        ]);    
        
        
    }

    public function download($id){
        // dd($id);
        $dokumen = Dokumen::where('id','=',$id)->first();
        // dd($dokumen);
        $file = storage_path('app/doc_folder/'.$dokumen->file_doc);
        return response()->download($file);
    }
}
