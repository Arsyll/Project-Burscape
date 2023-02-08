<!DOCTYPE HTML>
<head>
    <title>Edit Lowongan Kerja</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
{{-- {{!empty(old('syarat')) ? 'editor.setContent("{!!old("syarat")!!}")' : 'editor.setContent("{!!$loker->syarat!!}")'}}; --}}
<script>
    console.log({{$loker->deskripsi}})
    tinymce.init({
      selector: 'textarea#deskripsi',
      plugins: ["lists","stylebuttons"],
      promotion: false,
      toolbar: ['undo redo | styles | bold italic | indent outdent bullist numlist | alignleft aligncenter alignright'],
      menubar: '',
    });
    tinymce.init({
      selector: 'textarea#syarat',
      plugins: ["lists","stylebuttons"],
      promotion: false,
      toolbar: ['undo redo | styles | bold italic | indent outdent bullist numlist | alignleft aligncenter alignright'],
      menubar: '',
    });
</script>
<x-app-layout :assets="$assets ?? []">
    <div  class="pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('lowongan-kerja.index')}}">Lowongan Kerja</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{$loker->nama_lowongan}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Edit Lowongan</h4>
                </div>
             </div>
             <form action="{{route('lowongan-kerja.update' , $loker->id)}}" method="post">
                @method('PATCH')
                @csrf
                @foreach ($detailLoker as $d)
                    <input type="hidden" name="det[]" value="{{$d->id}}">
                @endforeach
                <div class="card-body">
                   <div class="col-sm-4">
                       <div class="form-group">
                           <label for="jurusan">Nama Lowongan<span class="text-danger">*</span></label>
                           <input type="text" class="form-control" value="{{!empty(old('nama_lowongan')) ? old('nama_lowongan') : $loker->nama_lowongan}}" id="nama_lowongan" name="nama_lowongan" placeholder="">
                       </div>
                   </div>
                   @if (auth()->user()->role == "Admin")
                   <div class="col-sm-6">
                       <div class="form-group">
                           <label for="jurusan">Perusahaan<span class="text-danger">*</span></label>
                           <select class="form-control" name="id_perusahaan" id="id_perusahaan">
                               <option value="">- Pilih -</option>
                               @foreach ($perusahaan as $p)
                                 <option value="{{$p->id}}"
                                    @if (!empty(old('id_perusahaan')))
                                        {{old('id_perusahaan') == $p->id ? 'selected' : ''}}
                                    @else
                                        {{$loker->id_perusahaan == $p->id ? 'selected' : ''}}
                                    @endif
                                    >{{$p->nama}}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                   @else
                   <input type="hidden" name="id_perusahaan" value="{{$loker->id_perusahaan}}">
                   @endif
                   <div class="col-sm-6">
                       <div class="form-group">
                           <div><span class="text-danger" id="bidang_error"></span></div>
                           <label for="jurusan">Bidang</label>
                           <select class="form form-control" name="bidang" id="bidang">
                               <option value="">- Pilih -</option>
                               @foreach ($bidang as $b)
                                   <option value="{{$b->id}}"
                                    @if (!empty(old('bidang')))
                                        {{old('bidang') == $b->id ? 'selected' : ''}}
                                    @else
                                        {{$loker->bidang == $b->id ? 'selected' : ''}}
                                    @endif
                                    >{{$b->nama_jurusan}}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jurusan">Tipe Pekerjaan<span class="text-danger">*</span></label>
                            <select class="form form-control" name="tipe_pekerjaan" id="tipe_pekerjaan">
                                <option value="">- Pilih -</option>
                                    <option value="Full-time"
                                    @if (!empty(old('tipe_pekerjaan')))
                                    {{old('tipe_pekerjaan') == 'Full-time' ? 'selected' : ''}}
                                    @else
                                    {{$loker->tipe_pekerjaan == 'Full-time' ? 'selected' : ''}}
                                    @endif
                                    >Full-time</option>
                                    <option value="Part-time"
                                    @if (!empty(old('tipe_pekerjaan')))
                                    {{old('tipe_pekerjaan') == 'Part-time' ? 'selected' : ''}}
                                    @else
                                    {{$loker->tipe_pekerjaan == 'Part-time' ? 'selected' : ''}}
                                    @endif
                                    >Part-time</option>
                                    <option value="Magang"
                                    @if (!empty(old('tipe_pekerjaan')))
                                    {{old('tipe_pekerjaan') == 'Magang' ? 'selected' : ''}}
                                    @else
                                    {{$loker->tipe_pekerjaan == 'Magang' ? 'selected' : ''}}
                                    @endif
                                    >Magang</option>
                                    <option value="Freelance"
                                    @if (!empty(old('tipe_pekerjaan')))
                                    {{old('tipe_pekerjaan') == 'Freelance' ? 'selected' : ''}}
                                    @else
                                    {{$loker->tipe_pekerjaan == 'Freelance' ? 'selected' : ''}}
                                    @endif
                                    >Freelance</option>
                            </select>
                        </div>
                    </div>
                   <div class="col-sm-4">
                       <div class="form-group">
                           <div><span class="text-danger" id="status_error"></span></div>
                           <label for="status">Status</label>
                           <select class="form form-control" name="status" id="status">
                               <option value="">- Pilih -</option>
                               <option value="Aktif" 
                               @if (!empty(old('status')))
                                    {{old('status') == 'Aktif' ? 'selected' : ''}}
                                @else
                                    {{$loker->status == 'Aktif' ? 'selected' : ''}}
                               @endif
                               >Aktif</option>
                               <option value="Non Aktif" 
                                @if (!empty(old('status')))
                                     {{old('status') == 'Non Aktif' ? 'selected' : ''}}
                                @else
                                    {{$loker->status == 'Non Aktif' ? 'selected' : ''}}
                                @endif
                               >Non Aktif</option>
   
                           </select>
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group">
                           <div><span class="text-danger" id="salary_error"></span></div>
                           <label for="jurusan">Salary<span class="text-danger">*</span></label>
                           <input type="number" min="0" maxlength="12" class="form-control" 
                           value="{{!empty(old('salary')) ? old('salary') : $loker->salary}}"name="salary" id="salary" placeholder="">
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group">
                           <div><span class="text-danger" id="alamat_error"></span></div>
                           <label for="jurusan">Alamat<span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="alamat" name="alamat" value="{{!empty(old('alamat')) ? old('alamat') : $loker->alamat}}" placeholder="">
                       </div>
                   </div>
                   <div class="col-sm-8">
                       <div class="form-group">
                           <div><span class="text-danger" id="id_kategori_error"></span></div>
                           <label for="id_kategori">Kategori Pekerjaan<span class="text-danger">*</span></label>
                           <br>
                           <div class="d-flex flex-wrap mt-2">
                               @foreach ($kategori as $k)
                                   <div class="col-sm-2 m-1">
                                       <input type="checkbox" class="form controll" name="kategori[]" value="{{$k->id}}" id="{{$k->nama_kategori}}"
                                        @if (!empty(old('kategori')))
                                            {{is_array(old('kategori')) && in_array($k->id,old('kategori')) ? 'checked' : '1'}}
                                        @else
                                            @foreach ($loker->detailLoker as $detail)
                                                {{$detail->id_kategori == $k->id ? 'checked' : ''}}
                                            @endforeach
                                        @endif                                       >
                                       <span>{{$k->nama_kategori}}</span>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                   </div>
                   <div class="col-sm-12">
                       <div class="form-group">
                           <div><span class="text-danger" id="deksripsi_error"></span></div>
                           <label for="jurusan">Deksripsi<span class="text-danger">*</span></label>
                           <textarea name="deskripsi" id="deskripsi">
                            {!! !empty(old('deskripsi')) ? old('deskripsi') : $loker->deskripsi_lowongan !!}
                           </textarea>
                       </div>
                   </div>
                   <div class="col-sm-12">
                       <div class="form-group">
                           <div><span class="text-danger" id="deksripsi_error"></span></div>
                           <label for="jurusan">Syarat<span class="text-danger">*</span></label>
                           <textarea name="syarat" id="syarat">
                            {!! !empty(old('syarat')) ? old('syarat') : $loker->syarat !!}
                           </textarea>
                       </div>
                   </div>
                   <div class="col-sm-8 d-flex">
                       <div class="form-group">
                           <button class="btn btn-primary" type="submit">Edit</button>
                       </div>
                       <div class="form-group ms-2">
                           <a class="btn btn-secondary" href="{{route('lowongan-kerja.index')}}">Cancel</a>
                       </div>
                   </div>
                 </div>
                </div>
            </form>
          </div>
       </div>
    </div>
</x-app-layout>

