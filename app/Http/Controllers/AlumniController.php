<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view("alumni.index",compact('jurusans'));
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
            'nama' => 'required',
            'no_telp' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'status' => 'required',
            'id_jurusan' => 'required',
        ]);

        $foto_profile = ['foto_profile' => $request->foto_profile ? $request->foto_profile : 'something'];

        $alumni = new Alumni();
        $status = $alumni->create(array_merge($input,$foto_profile));

        return response()->json([
            'code' => 200,
            'message' => 'Alumni berhasil ditambah!',
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
            'message' => 'detail jurusan!',
            'data' => Alumni::findOrFail($id)
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
        // $rule = [
        //     'nama_jurusan' => 'required',
        //     'no_telp' => 'required|numeric',
        //     'tanggal_lahir' => 'required|date',
        //     'alamat' => 'required',
        //     'status' => 'required',
        //     'jurusan' => 'required',
        // ];
        // $this->validate($request, $rule);

        $input = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'status' => 'required',
            'id_jurusan' => 'required',
        ]);

        $alumni = Alumni::find($id);
        $status = $alumni->update($input);

        return response()->json([
            'code' => 200,
            'message' => 'Alumni berhasil diubah!',
            'data' => $status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->findOrFail($alumni->id)->delete($alumni);
        return response()->json([
            'message' => 'Alumni berhasil dihapus!'
        ]);
    }

    public function listAlumni(){
        $alumni = Alumni::with(['btjurusan'])->get();
        return response()->json([
            'massage' => 'List Jurusan',
            'data' => $alumni
        ]);
    }
}
