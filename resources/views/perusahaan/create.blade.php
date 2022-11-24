<!DOCTYPE HTML>
<head>
    <title>Tambah Perusahaan</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
    tinymce.init({
      selector: 'textarea#tentang',
      plugins: ["lists","stylebuttons"],
      promotion: false,
      toolbar: ['undo redo | styles | bold italic | indent outdent bullist numlist | alignleft aligncenter alignright'],
      menubar: '',
    });

</script>
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Tambah Perusahaan</h4>
                </div>
             </div>
             <form action="{{route('perusahaan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   <div class="col-sm-4">
                       <div class="form-group">
                           <label for="jurusan">Nama Perusahaan<span class="text-danger">*</span></label>
                           <input type="text" class="form-control" value="{{old('nama')}}" id="nama" name="nama" placeholder="">
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group">
                           <label for="jurusan">Bidang<span class="text-danger">*</span></label>
                           <input type="text" class="form-control" value="{{old('bidang')}}" id="bidang" name="bidang" placeholder="">
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group">
                           <label for="jurusan">Email<span class="text-danger">*</span></label>
                           <input type="email" class="form-control" value="{{old('email_perusahaan')}}"name="email_perusahaan" id="email_perusahaan" placeholder="">
                       </div>
                   </div>
                   <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jurusan">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="">
                        </div>
                    </div>
                   <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jurusan">Password Confirm<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="">
                        </div>
                    </div>
                   <div class="col-sm-6">
                       <div class="form-group">
                           <label for="jurusan">No Telp<span class="text-danger">*</span></label>
                           <input type="number" class="form-control" id="no_telp" name="no_telp" value="{{old('no_telp')}}" placeholder="">
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group">
                           <label for="jurusan">Alamat<span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}" placeholder="">
                       </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="alamat">Alamat Website</label>
                            <input type="text" class="form-control" value="{{old('url')}}" id="url" name="url" placeholder="">
                        </div>
                    </div>  
                   <div class="col-sm-12">
                       <div class="form-group">
                           <div><span class="text-danger" id="deksripsi_error"></span></div>
                           <label for="jurusan">Tentang Perusahaan<span class="text-danger">*</span></label>
                           <textarea name="tentang" id="tentang">
                            {!! !empty(old('tentang')) ? old('tentang') : '' !!}
                           </textarea>
                       </div>
                   </div>
                   <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jurusan">Foto Perusahaan</label>
                            <input type="file" class="form-control" id="foto_perusahaan" name="foto_perusahaan" value="{{old('foto_perusahaan')}}" placeholder="">
                        </div>
                    </div>
                   <div class="col-sm-8 d-flex">
                       <div class="form-group">
                           <button class="btn btn-primary" type="submit">Tambah</button>
                       </div>
                       <div class="form-group ms-2">
                           <a class="btn btn-secondary" href="{{route('perusahaan.index')}}">Cancel</a>
                       </div>
                   </div>
                 </div>
                </div>
            </form>
          </div>
       </div>
    </div>
</x-app-layout>
