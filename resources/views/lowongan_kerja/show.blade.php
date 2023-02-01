<!DOCTYPE HTML>
<head>
    <title>Lowongan Kerja {{$loker->nama_lowongan}}</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title w-100">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Detail Lowongan</h4>
                    </div>
                    <div class="my-2 d-flex justify-content-end">
                        <a href="{{ url('lamaran?id='.$loker->id) }}" class="btn btn-primary">Lihat Semua Lamaran</a>
                    </div>
                </div>
             </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table ml-4 mt-1 mb-2">
                                <tr>
                                    <td width="30%"><b>Nama Lowongan</b></td>
                                    <td>: {{$loker->nama_lowongan}}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Nama Perusahaan</b></td>
                                    <td>: {{$loker->perusahaan->nama}}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Bidang</b></td>
                                    <td>: {{$loker->bidangs->nama_jurusan}}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Tipe Pekerjaan</b></td>
                                    <td>: {{$loker->tipe_pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Status</b></td>
                                    <td>: 
                                        @if ($loker->status == "Aktif")
                                            <span class="badge p-2 bg-success">Aktif</span>
                                        @else
                                            <span class="badge p-2 bg-danger">Non Aktif</span>
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Salary</b></td>
                                    <td>: @rupiah($loker->salary)</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Alamat</b></td>
                                    <td>: {{$loker->alamat}}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Kategori Pekerjaan</b></td>
                                    <td>: 
                                        @foreach ($loker->detailLoker as $det)
                                            <span class="badge p-2 bg-secondary">{{' '. $det->kategori->nama_kategori}}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Deskripsi</b></td>
                                    <td>{!!$loker->deskripsi_lowongan!!}</td>
                                </tr>
                                <tr>
                                    <td width="30%"><b>Syarat</b></td>
                                    <td class="text-wrap">{!!$loker->syarat!!}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
          </div>
       </div>
    </div>
</x-app-layout>

