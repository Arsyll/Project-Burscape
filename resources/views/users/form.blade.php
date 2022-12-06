<!DOCTYPE HTML>
<head>
   <title>Edit Profile</title>
</head>
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
    tinymce.init({
      selector: 'textarea#tentang',
      promotion: false,
      menubar: '',
    });
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<x-app-layout layout="{{$layout}}" :assets="$assets ?? []">
   <div>
      <?php
         $id = $id ?? null;
      ?>
      @if(isset($id))
      {!! Form::model($data, ['route' => ['users.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
      @else
      {!! Form::open(['route' => ['users.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      @endif
      <div class="row">
         @if($data->role == "Admin")
         <div class="col-xl-12 col-lg-8">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">{{$id !== null ? 'Edit' : 'New' }} Admin Information</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Nama Lengkap: <span class="text-danger">*</span></label>
                              {{ Form::text('nama_lengkap', empty(old('nama_lengkap')) ? $data->user_role->admin->nama_lengkap : old('nama_lengkap'), ['class' => 'form-control', 'placeholder' => 'Nama Lengkap']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add1">Jabatan : </label>
                              {{ Form::text('jabatan',empty( old('jabatan')) ? $data->user_role->admin->jabatan : old('jabatan'), ['class' => 'form-control', 'placeholder' => 'Jabatan']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add2">Foto Profile : </label><br>
                              {{ Form::file('foto_profile', ['class' => 'form-control']) }}
                           </div>
                        </div>
                        <hr>
                        <h5 class="mb-3">User</h5>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Username : <span class="text-danger">*</span></label>
                              {{ Form::text('username', empty(old('username')) ? $data->username : old('username'), ['class' => 'form-control', 'placeholder' => 'Username']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add1">Email : </label>
                              {{ Form::email('email',empty( old('email')) ? $data->email : old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="pass">Password:</label>
                              {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="rpass">Repeat Password:</label>
                              {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Repeat Password']) }}
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{$id !== null ? 'Edit' : 'Add' }} Profile</button>
                  </div>
               </div>
            </div>
         </div>
         @elseif($data->role == "Perusahaan")
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Profile</h4>
                  </div>
               </div>
               <form action="{{route('users.update',$data->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="card-body">
                     <div class="col-sm-4">
                         <div class="form-group">
                             <label for="jurusan">Nama Perusahaan<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" value="{{old('nama') ?? $data->user_role->perusahaan->nama}}" id="nama" name="nama" placeholder="">
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label for="jurusan">Bidang<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" value="{{old('bidang') ?? $data->user_role->perusahaan->bidang}}" id="bidang" name="bidang" placeholder="">
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label for="jurusan">Email<span class="text-danger">*</span></label>
                             <input type="email" class="form-control" value="{{old('email_perusahaan') ?? $data->user_role->perusahaan->email_perusahaan}}"name="email_perusahaan" id="email_perusahaan" placeholder="">
                         </div>
                     </div>
                     <div class="col-sm-6">
                          <div class="form-group">
                              <label for="jurusan">Password</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="">
                          </div>
                      </div>
                     <div class="col-sm-6">
                          <div class="form-group">
                              <label for="jurusan">Password Confirm</label>
                              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="">
                          </div>
                      </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label for="jurusan">No Telp<span class="text-danger">*</span></label>
                             <input type="number" class="form-control" id="no_telp" name="no_telp" value="{{old('no_telp') ?? $data->user_role->perusahaan->no_telp}}" placeholder="">
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label for="jurusan">Alamat<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat') ?? $data->user_role->perusahaan->alamat}}" placeholder="">
                         </div>
                     </div>
                     <div class="col-sm-4">
                          <div class="form-group">
                              <label for="alamat">Alamat Website</label>
                              <input type="text" class="form-control" value="{{old('url') ?? $data->user_role->perusahaan->url}}" id="url" name="url" placeholder="">
                          </div>
                      </div>  
                     <div class="col-sm-12">
                         <div class="form-group">
                             <div><span class="text-danger" id="deksripsi_error"></span></div>
                             <label for="jurusan">Tentang Perusahaan<span class="text-danger">*</span></label>
                             <textarea name="tentang" id="tentang">
                              {!! !empty(old('tentang')) ? old('tentang') : $data->user_role->perusahaan->tentang !!}
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
                             <button class="btn btn-primary" type="submit">Edit</button>
                         </div>
                         <div class="form-group ms-2">
                             <a class="btn btn-secondary" href="{{route('users.show',auth()->user()->id)}}">Cancel</a>
                         </div>
                     </div>
                   </div>
                  </div>
              </form>
            </div>
         </div>
         @elseif($data->role == "Alumni")
         <div class="col-xl-12 col-lg-8">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">{{$id !== null ? 'Edit' : 'New' }} User Information</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Nama Lengkap: <span class="text-danger">*</span></label>
                              {{ Form::text('nama', empty(old('nama')) ? $data->user_role->alumni->nama : old('nama'), ['class' => 'form-control', 'placeholder' => 'Nama Lengkap']) }}
                           </div>
                           <div class="form-group col-md-3">
                              <label class="form-label" for="add1">Status : <span class="text-danger">*</span></label>
                              {{ Form::text('status',empty( old('status')) ? $data->user_role->alumni->status : old('status'), ['class' => 'form-control', 'placeholder' => 'Status']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">No Telp : <span class="text-danger">*</span></label>
                              {{ Form::number('no_telp', empty(old('no_telp')) ? $data->user_role->alumni->no_telp : old('no_telp'), ['class' => 'form-control','min' => '0', 'placeholder' => 'No Telp']) }}
                           </div>
                           <div class="form-group col-md-3">
                              <label class="form-label" for="add1">Tanggal Lahir : <span class="text-danger">*</span></label>
                              {{ Form::date('tanggal_lahir',empty( old('tanggal_lahir')) ? $data->user_role->alumni->tanggal_lahir : old('tanggal_lahir'), ['class' => 'form-control', 'placeholder' => 'Status']) }}
                           </div>
                           <div class="col-md-2"></div>
                           <div class="form-group col-md-2">
                              <label class="form-label" for="fname">Angkatan : <span class="text-danger">*</span></label>
                              {{ Form::number('angkatan', empty(old('angkatan')) ? $data->user_role->alumni->angkatan : old('angkatan'), ['class' => 'form-control','min' => '0','max' => '2022', 'placeholder' => 'Angkatan']) }}
                           </div>
                           <div class="form-group col-md-4">
                              <label class="form-label" for="add1">Jurusan : <span class="text-danger">*</span></label>
                              <select name="id_jurusan" class="form-control">
                                 <option value="">- Pilih -</option>
                                 @foreach ($jurusan as $j)
                                    <option value="{{$j->id}}"
                                       {{$data->user_role->alumni->id_jurusan == $j->id ? 'selected' : ''}}
                                       >{{$j->nama_jurusan}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-sm-8">
                              <label class="form-label" id="country">Alamat : <span class="text-danger">*</span></label>
                              {{ Form::text('alamat', empty(old('alamat')) ? $data->user_role->alumni->alamat : old('alamat'), ['class' => 'form-control']) }}

                           </div>
                           <div class="form-group col-md-8">
                              <label class="form-label" for="mobno">Tentang :  <span class="text-danger">*</span></label>
                              <textarea name="tentang" id="tentang">
                                 {!! empty(old('tentang')) ? $data->user_role->alumni->tentang : old('tentang')  !!}
                              </textarea>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add2">Foto Profile : </label><br>
                              {{ Form::file('foto_profile', ['class' => 'form-control']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add2">CV / Resume : </label><br>
                              {{ Form::file('resume', ['class' => 'form-control']) }}
                           </div>
                        </div>
                        <hr>
                        <h5 class="mb-3">Pengalaman</h5>
{{---------------------------------------------- Pengalaman  -----------------------------------------------------------------}}
                        <div id="pnglmn">
                           <div id="pengalaman">
                              @if ($pengalaman->count() == 0)
                              <div class="form-group col-md-6" id="pengalaman_">
                                 <div class="d-flex">
                                       <div class="col-xl-6 col-lg-6 col-sm-6 mx-2">
                                          <input type="text" name="judul[]" class="form-control" placeholder="Judul" value="{{old('judul.0')}}">
                                       </div>
                                       <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                          <input type="text" name="perusahaan[]" class="form-control" placeholder="Nama Perusahaan" value="{{old('perusahaan.0')}}">
                                       </div>
                                       <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                          <input type="number" name="dari_tahun[]" class="form-control" placeholder="Dari Tahun" min="2010" max="2022" value="{{old('dari_tahun.0')}}">
                                       </div>
                                       <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                          <input type="number" name="ke_tahun[]" class="form-control" placeholder="Ke Tahun" min="2010" max="2022"value="{{old('ke_tahun.0')}}">
                                       </div>
                                       <div>
                                          <a class="btn btn-primary mb-2" id="add_item">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                   <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                   <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                             </svg>
                                          </a>
                                       </div>
                                 </div>
                              </div>
                              @else
                              @foreach ($pengalaman as $key=>$pengalaman)
                                 @if ($loop->first)
                                 <div class="form-group col-md-6" id="pengalaman_">
                                    <input type="hidden" name="pengalaman_id[]" value="{{$pengalaman->id}}">
                                    <div class="d-flex">
                                          <div class="col-xl-6 col-lg-6 col-sm-6 mx-2">
                                             <input type="text" name="judul[]" class="form-control" placeholder="Judul" value="{{$pengalaman->judul}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="text" name="perusahaan[]" class="form-control" placeholder="Perusahaan" value="{{$pengalaman->perusahaan}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="dari_tahun[]" class="form-control" placeholder="Dari Tahun" min="2010" max="2022" value="{{$pengalaman->dariTahun()}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="ke_tahun[]" class="form-control" placeholder="Ke Tahun" min="2010" max="2022" value="{{$pengalaman->keTahun()}}">
                                          </div>
                                          <div>
                                             <a class="btn btn-primary mb-2 btn-lg" id="add_item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                             </a>
                                          </div>
                                    </div>
                                 </div>
                                 @else
                                 <div class="form-group col-md-6" id="pengalaman_{{++$key}}">
                                    <input type="hidden" name="pengalaman_id[]" class="form-control" value="{{$pengalaman->id}}">
                                    <div class="d-flex">
                                          <div class="col-xl-6 col-lg-6 col-sm-6 mx-2">
                                             <input type="text" name="judul[]" class="form-control" placeholder="Judul" value="{{$pengalaman->judul}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="text" name="perusahaan[]" class="form-control" placeholder="Perusahaan" value="{{$pengalaman->perusahaan}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="dari_tahun[]" class="form-control" placeholder="Dari Tahun" min="2010" max="2022" value="{{$pengalaman->dariTahun()}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="ke_tahun[]" class="form-control" placeholder="Ke Tahun" min="2010" max="2022" value="{{$pengalaman->keTahun()}}">
                                          </div>
                                          <div>
                                             <a class="btn btn-primary mb-2" id="add_item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                             </a>
                                          </div>
                                          <div>
                                             <a class='btn btn-danger mb-2 ml-2 mx-2 delete_item' id='delete_item_{{$key}}'> 
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x-circle table-cancel'> <circle cx='12' cy='12' r='10'></circle> <line x1='15' y1='9' x2='9' y2='15'></line> <line x1='9' y1='9' x2='15' y2='15'></line> </svg>
                                             </a>
                                          </div>
                                    </div>
                                 </div>
                                 @endif
                                 @endforeach
                                 <div class="key_count" id="key_count_{{$key}}"></div>
                              @endif
                              {{-- @if (!empty(old('new_judul.0')))
                                 @for ($i=1;$i < (count(old('new_judul')));$i++)
                                 <div class="form-group col-md-6" id="pengalaman_{{$i}}">
                                    <div class="d-flex">
                                          <div class="col-xl-6 col-lg-6 col-sm-6 mx-2">
                                             <input type="text" name="new_judul[]" class="form-control" placeholder="Judul" value="{{old('new_judul.' . $i)}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="text" name="new_perusahaan[]" class="form-control" placeholder="Perusahaan" value="{{old('new_perusahaan.' . $i)}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="new_dari_tahun[]" class="form-control" placeholder="Dari Tahun" min="2010" max="2022" value="{{old('new_dari_tahun.' . $i)}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="new_ke_tahun[]" class="form-control" placeholder="Ke Tahun" min="2010" max="2022" value="{{old('new_ke_tahun.' . $i)}}">
                                          </div>
                                          <div>
                                             <a class="btn btn-primary mb-2" id="add_item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                             </a>
                                          </div>
                                          <div>
                                             <a class='btn btn-danger mb-2 ml-2 delete_item' id='delete_item_{{$i}}'> 
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x-circle table-cancel'> <circle cx='12' cy='12' r='10'></circle> <line x1='15' y1='9' x2='9' y2='15'></line> <line x1='9' y1='9' x2='15' y2='15'></line> </svg>
                                             </a>
                                          </div>
                                    </div>
                                 </div>
                                 @endfor
                              @endif --}}
                        </div>
{{---------------------------------------------- End Pengalaman  -----------------------------------------------------------------}}
                        <hr>
                        <h5 class="mb-3">Edukasi</h5>
{{---------------------------------------------- Edukasi  -----------------------------------------------------------------}}
                        <div id="edksi">
                           <div id="edukasi">
                              @if ($edukasi->count() == 0)
                              <div class="form-group col-md-6" id="edukasi_">
                                 <div class="d-flex">
                                       <div class="col-xl-6 col-lg-6 col-sm-6 mx-2">
                                          <input type="text" name="nama_lembaga[]" class="form-control" placeholder="Nama Lembaga" value="{{old('nama_lembaga.0')}}">
                                       </div>
                                       <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                          <input type="text" name="bidang[]" class="form-control" placeholder="Bidang" value="{{old('bidang.0')}}">
                                       </div>
                                       <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                          <input type="number" name="tahun[]" class="form-control" placeholder="Tahun Lulus" min="2010" max="2022" value="{{old('tahun.0')}}">
                                       </div>
                                       <div>
                                          <a class="btn btn-primary mb-2" id="add_item_edukasi">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                   <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                   <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                             </svg>
                                          </a>
                                       </div>
                                 </div>
                              </div>
                              @else
                              @foreach ($edukasi as $key=>$e)
                                 @if ($loop->first)
                                 <div class="form-group col-md-6" id="edukasi_">
                                    <input type="hidden" name="edukasi_id[]" value="{{$e->id}}">
                                    <div class="d-flex">
                                          <div class="col-xl-6 col-lg-6 col-sm-6 mx-2">
                                             <input type="text" name="nama_lembaga[]" class="form-control" placeholder="Nama Lembaga" value="{{$e->nama_lembaga}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="text" name="bidang[]" class="form-control" placeholder="Bidang" value="{{$e->bidang}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="tahun[]" class="form-control" placeholder="Tahun Lulus" min="2010" max="2022" value="{{$e->tahun}}">
                                          </div>
                                          <div>
                                             <a class="btn btn-primary mb-2 btn-lg" id="add_item_edukasi">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                             </a>
                                          </div>
                                    </div>
                                 </div>
                                 @else
                                 <div class="form-group col-md-6" id="edukasi_{{++$key}}">
                                    <input type="hidden" name="edukasi_id[]" class="form-control" value="{{$e->id}}">
                                    <div class="d-flex">
                                          <div class="col-xl-6 col-lg-6 col-sm-6 mx-2">
                                             <input type="text" name="nama_lembaga[]" class="form-control" placeholder="Nama Lembaga" value="{{$e->nama_lembaga}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="text" name="bidang[]" class="form-control" placeholder="Bidang" value="{{$e->bidang}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="tahun[]" class="form-control" placeholder="Tahun Lulus" min="2010" max="2022" value="{{$e->tahun}}">
                                          </div>
                                          <div>
                                             <a class="btn btn-primary mb-2" id="add_item_edukasi">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                             </a>
                                          </div>
                                          <div>
                                             <a class='btn btn-danger mb-2 ml-2 mx-2 delete_item_edukasi' id='delete_item_edukasi_{{$key}}'> 
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x-circle table-cancel'> <circle cx='12' cy='12' r='10'></circle> <line x1='15' y1='9' x2='9' y2='15'></line> <line x1='9' y1='9' x2='15' y2='15'></line> </svg>
                                             </a>
                                          </div>
                                    </div>
                                 </div>
                                 @endif
                                 @endforeach
                                 <div class="key_count_edukasi" id="key_count_edukasi_{{$key}}"></div>
                              @endif
                              {{-- @if (!empty(old('new_nama_lembaga.1')))
                                 @for ($i=1;$i < (count(old('new_nama_lembaga')));$i++)
                                 <div class="form-group col-md-6" id="edukasi_{{$i}}">
                                    <div class="d-flex">
                                          <div class="col-xl-6 col-lg-6 col-sm-6 mx-2">
                                             <input type="text" name="new_nama_lembaga[]" class="form-control" placeholder="Nama Lembaga" value="{{old('new_nama_lembaga.' . $i)}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="text" name="new_bidang[]" class="form-control" placeholder="Bidang" value="{{old('new_bidang.' . $i)}}">
                                          </div>
                                          <div class="col-xl-4 col-lg-2 col-sm-4 mx-2">
                                             <input type="number" name="new_tahun[]" class="form-control" placeholder="Tahun" min="2010" max="2022" value="{{old('new_tahun.' . $i)}}">
                                          </div>
                                          <div>
                                             <a class="btn btn-primary mb-2" id="add_item_edukasi">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                             </a>
                                          </div>
                                          <div>
                                             <a class='btn btn-danger mb-2 ml-2 delete_item_edukasi mx-2' id='delete_item_edukasi_{{$i}}'> 
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x-circle table-cancel'> <circle cx='12' cy='12' r='10'></circle> <line x1='15' y1='9' x2='9' y2='15'></line> <line x1='9' y1='9' x2='15' y2='15'></line> </svg>
                                             </a>
                                          </div>
                                    </div>
                                 </div>
                                 @endfor
                              @endif --}}
                        </div>
{{---------------------------------------------- End Edukasi  -----------------------------------------------------------------}}
                        <hr>
                        <h5 class="mb-3">Security</h5>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Username : <span class="text-danger">*</span></label>
                              {{ Form::text('username', empty(old('username')) ? $data->username : old('username'), ['class' => 'form-control', 'placeholder' => 'Username']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="add1">Email : </label>
                              {{ Form::email('email',empty( old('email')) ? $data->email : old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="pass">Password:</label>
                              {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="rpass">Repeat Password:</label>
                              {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Repeat Password']) }}
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{$id !== null ? 'Edit' : 'Add' }} Profile</button>
                  </div>
               </div>
            </div>
         </div>
         @endif
        </div>
        {!! Form::close() !!}
   </div>
   @if ($data->role == "Alumni")
   <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
   <script type="text/javascript">
          // Pengalaman
          var no = {!! $pengalaman->count() == 0 ? 1 : "parseInt($('.key_count').attr('id').replace(/key_count_/, ''))" !!};
          $('body').on('click' , '#add_item' , function() {
              no = no + 1;
              var div = $("<div class='form-group col-md-6' id='pengalaman_" + no + "'> <div class='d-flex'> <div class='col-xl-6 col-lg-6 col-sm-6 mx-2'> <input type='text' name='new_judul[]' class='form-control' placeholder='Judul' value='{{old('new_judul." + no + "')}}'> </div> <div class='col-xl-4 col-lg-2 col-sm-4 mx-2'> <input type='text' name='new_perusahaan[]' class='form-control' placeholder='Nama Perusahaan' value='{{old('new_perusahaan." + no + "')}}'> </div> <div class='col-xl-4 col-lg-2 col-sm-4 mx-2'> <input type='number' name='new_dari_tahun[]' class='form-control' placeholder='Dari Tahun' min='2010' max='2022' value='{{old('new_dari_tahun." + no + "')}}'> </div> <div class='col-xl-4 col-lg-2 col-sm-4 mx-2'> <input type='number' name='new_ke_tahun[]' class='form-control' placeholder='Ke Tahun' min='0' value='{{old('new_ke_tahun." + no + "')}}'> </div> <div> <a class='btn btn-primary mb-2' id='add_item'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'> <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/> <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/> </svg> </a> </div> <div> <a class='btn btn-danger mb-2 ml-2 delete_item mx-2' id='delete_item_" + no + "'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x-circle table-cancel'> <circle cx='12' cy='12' r='10'></circle> <line x1='15' y1='9' x2='9' y2='15'></line> <line x1='9' y1='9' x2='15' y2='15'></line> </svg> </a> </div> </div> </div>")
              $('#pengalaman').append(div); 
          });
  
          $('body').on('click' , '.delete_item' , function() {
              no = no - 1;
              var id =  $(this).attr('id').replace(/delete_item_/, '');
              $("#pengalaman_" + id).remove(); 
          });

          // Edukasi
          var no = {!! $edukasi->count() == 0 ? 1 : "parseInt($('.key_count_edukasi').attr('id').replace(/key_count_edukasi/, ''))" !!};
          $('body').on('click' , '#add_item_edukasi' , function() {
              no = no + 1;
              var div = $("<div class='form-group col-md-6' id='edukasi_" + no + "'> <div class='d-flex'> <div class='col-xl-6 col-lg-6 col-sm-6 mx-2'> <input type='text' name='new_nama_lembaga[]' class='form-control' placeholder='Nama Lembaga' value='{{old('new_nama_lembaga." + no + "')}}'> </div> <div class='col-xl-4 col-lg-2 col-sm-4 mx-2'> <input type='text' name='new_bidang[]' class='form-control' placeholder='Bidang' value='{{old('new_bidang." + no + "')}}'> </div> <div class='col-xl-4 col-lg-2 col-sm-4 mx-2'> <input type='number' name='new_tahun[]' class='form-control' placeholder='Tahun Lulus' min='2010' max='2022' value='{{old('new_tahun." + no + "')}}'> </div><div> <a class='btn btn-primary mb-2' id='add_item_edukasi'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'> <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/> <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/> </svg> </a> </div> <div> <a class='btn btn-danger mb-2 ml-2 delete_item_edukasi mx-2' id='delete_item_edukasi_" + no + "'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x-circle table-cancel'> <circle cx='12' cy='12' r='10'></circle> <line x1='15' y1='9' x2='9' y2='15'></line> <line x1='9' y1='9' x2='15' y2='15'></line> </svg> </a> </div> </div> </div>")
              $('#edukasi').append(div); 
          });
  
          $('body').on('click' , '.delete_item_edukasi' , function() {
              no = no - 1;
              var id =  $(this).attr('id').replace(/delete_item_edukasi_/, '');
              $("#edukasi_" + id).remove(); 
          });
      </script>
@endif
</x-app-layout>
@include('partials.dashboard._app_toast')