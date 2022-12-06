<!DOCTYPE HTML>
<head>
    <title>Tambah Lowongan Kerja</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
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
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Tambah Lowongan</h4>
                </div>
             </div>
             <form action="{{route('lowongan-kerja.store')}}" method="post">
                @csrf
                <div class="card-body">
                   <div class="col-sm-4">
                       <div class="form-group">
                           <div><span class="text-danger" id="nama_lowongan_error"></span></div>
                           <label for="jurusan">Nama Lowongan<span class="text-danger">*</span></label>
                           <input type="text" class="form-control" value="{{old('nama_lowongan')}}" id="nama_lowongan" name="nama_lowongan" placeholder="">
                       </div>
                   </div>
                   @if(auth()->user()->user_role->perusahaan)
                   <input type="hidden" name="id_perusahaan" value="{{ auth()->user()->user_role->perusahaan->id }}">
                   @else
                   <div class="col-sm-6">
                       <div class="form-group">
                           <div><span class="text-danger" id="id_perusahaan_error"></span></div>
                           <label for="jurusan">Perusahaan<span class="text-danger">*</span></label>
                           <select class="form-control" name="id_perusahaan" id="id_perusahaan">
                               <option value="">- Pilih -</option>
                               @foreach ($perusahaan as $p)
                                 <option value="{{$p->id}}"
                                    {{old('id_perusahaan') == $p->id ? 'selected' : ''}}
                                    >{{$p->nama}}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                   @endif
                   <div class="col-sm-6">
                       <div class="form-group">
                           <div><span class="text-danger" id="bidang_error"></span></div>
                           <label for="jurusan">Bidang<span class="text-danger">*</span></label>
                           <select class="form form-control" name="bidang" id="bidang">
                               <option value="">- Pilih -</option>
                               @foreach ($bidang as $b)
                                   <option value="{{$b->id}}"
                                    {{old('bidang') == $b->id ? 'selected' : ''}}
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
                                    {{old('tipe_pekerjaan') == 'Full-time' ? 'selected' : ''}}
                                    >Full-time</option>
                                   <option value="Part-time"
                                    {{old('tipe_pekerjaan') == 'Part-time' ? 'selected' : ''}}
                                    >Part-time</option>
                                   <option value="Magang"
                                    {{old('tipe_pekerjaan') == 'Magang' ? 'selected' : ''}}
                                    >Magang</option>
                                   <option value="Freelance"
                                    {{old('tipe_pekerjaan') == 'Freelance' ? 'selected' : ''}}
                                    >Freelance</option>
                           </select>
                       </div>
                   </div>
                   <div class="col-sm-4">
                       <div class="form-group">
                           <div><span class="text-danger" id="status_error"></span></div>
                           <label for="status">Status<span class="text-danger">*</span></label>
                           <select class="form form-control" name="status" id="status">
                               <option value="">- Pilih -</option>
                               <option value="Aktif" {{old('status') == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                               <option value="Non Aktif" {{old('status') == 'Non Aktif' ? 'selected' : ''}}>Non Aktif</option>
   
                           </select>
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group">
                           <div><span class="text-danger" id="salary_error"></span></div>
                           <label for="jurusan">Salary<span class="text-danger">*</span></label>
                           <input type="number" min="0" maxlength="12" class="form-control" value="{{old('salary')}}"name="salary" id="salary" placeholder="">
                       </div>
                   </div>
                   <div class="col-sm-6">
                       <div class="form-group">
                           <div><span class="text-danger" id="alamat_error"></span></div>
                           <label for="jurusan">Alamat<span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}" placeholder="">
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
                                       @if (is_array(old('kategori')) && in_array($k->id,old('kategori')))
                                           checked
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
                           <label for="jurusan">Deskripsi<span class="text-danger">*</span></label>
                           <textarea name="deskripsi" id="deskripsi">
                            {!! !empty(old('deskripsi')) ? old('deskripsi') : '' !!}
                           </textarea>
                       </div>
                   </div>
                   <div class="col-sm-12">
                       <div class="form-group">
                           <div><span class="text-danger" id="deksripsi_error"></span></div>
                           <label for="jurusan">Syarat<span class="text-danger">*</span></label>
                           <textarea name="syarat" id="syarat">
                            {!! !empty(old('syarat')) ? old('syarat') : '' !!}
                           </textarea>
                       </div>
                   </div>
                   <div class="col-sm-8 d-flex">
                       <div class="form-group">
                           <button class="btn btn-primary" type="submit">Tambah</button>
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
    {{-- <script>
        $(document).ready(function () {
            getLoker();


            $(document).on('click', '#del-btn', function () {
                var id = $(this).data('id');
                Swal.fire({
                    icon: 'error',
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#28C76F',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            'url': '{{url('lowongan-kerja')}}/' + id,
                            'type': 'POST',
                            'data': {
                                '_method': 'DELETE',
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.message) {
                                    getLoker();
                                    return toastr.success(response.message, 'Success!', {
                                        closeButton: true,
                                        tapToDismiss: true
                                    });
                                }
                                    getLoker();
                                    return toastr.error('Failed!', 'Failed!', {
                                        closeButton: true,
                                        tapToDismiss: true
                                    });
                            }
                        });
                    } else {
                        console.log(`dialog was dismissed by ${result.dismiss}`)
                    }
                });
            });

            function clearErrorMessages(){
                $(document).find('#form-modal-add').find('#type_doc_error').text("");
                $(document).find('#form-modal-add').find('#name_doc_error').text("");
                $(document).find('#form-modal-add').find('#no_doc_error').text("");
                $(document).find('#form-modal-add').find('#file_doc_error').text("");
                $(document).find('#form-modal-edit').find('#update_file_doc_error').text("");
                $(document).find('#form-modal-edit').find('#update_name_doc_error').text("");
                $(document).find('#form-modal-edit').find('#update_type_doc_error').text("");
                $(document).find('#form-modal-edit').find('#update_no_doc_error').text("");
            }

            function getLoker() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('listLoker') }}",
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response.data)
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data,  // Get the data object
                            columns: [
                                { 'data': 'nama_lowongan' },
                                { 'data': 'nama_lowongan' },
                                { 'data': 'nama_lowongan' },
                                { 'data': 'nama_lowongan' },
                                
                            ]
                        });
                        $table.destroy()
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data,  // Get the data object
                            columns: [
                                { 'data': 'nama_lowongan' },
                                { 'data': 'perusahaan.nama' },
                                { 'data': 'bidang.nama_jurusan' },
                                {'data' : "id" , render : function ( data, type, row, meta ) {
                                return type === 'display'  ?
                                '<div class="row justify-content-center">'+
                                    '<div class="col-3">'+
                                        '<a class="btn btn-primary btn-sm" id="download-btn" href="{{url('dokumen/download')}}/'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>'+
                                        '</a>'+
                                    '</div>'+
                                    '<div class="col-3">'+
                                        '<button class="btn btn-warning btn-sm" id="update-btn" href="#" data-id="'+data+'" data-bs-toggle="modal" data-bs-target="#form-modal-edit">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>'+
                                        '</button>'+
                                    '</div>'+
                                    '<div class="col-3">'+
                                        '<button class="btn btn-danger btn-sm" id="del-btn" href="#" data-id="'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>'+
                                        '</button>'+
                                    '</div>'+
                                '</div>' :
                                    data;
                                }},                             
                            ],
                            'columnDefs': [ {
                                'targets': [3], 
                                'orderable': false,
                            }]
                        });
                        // console.log(response.data);
                        // let rows = '';
                        // $.each(response.data, function (idx, data) {
                        //     idx++
                        //     rows += '<tr>'+
                        //         // dokumen/download
                        //                 '<td>'+data.no_doc+'</td>'+
                        //                 '<td>'+data.name_doc+'</td>'+
                        //                 '<td>'+data.type_doc+'</td>'+
                        //                 '<td>'+data.id_perusahaan+'</td>'+
                        //                 '<td>'+
                        //                     '<div class="row justify-content-center">'+
                        //                         '<div class="col-2">'+
                        //                             '<a class="btn btn-primary btn-sm" id="download-btn" href="{{url('dokumen/download')}}/'+data.id+'">'+
                        //                                 '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>'+
                        //                             '</a>'+
                        //                         '</div>'+
                        //                         '<div class="col-2">'+
                        //                             '<button class="btn btn-warning btn-sm mx-1" id="update-btn" href="#" data-id="'+data.id+'" data-bs-toggle="modal" data-bs-target="#form-modal-edit">'+
                        //                                 '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>'+
                        //                             '</button>'+
                        //                         '</div>'+
                        //                         '<div class="col-2">'+
                        //                             '<button class="btn btn-danger btn-sm mx-2" id="del-btn" href="#" data-id="'+data.id+'">'+
                        //                                 '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>'+
                        //                             '</button>'+
                        //                         '</div>'+
                        //                     '</div>'+
                        //                 '</td>' 
                        //             '</tr>';
                        // });
                        // $('#list').html('');
                        // $('#list').append(rows);
                        // if (feather) {
                        //     feather.replace({
                        //         width: 14,
                        //         height: 14
                        //     });
                        // }
                    }
                });
            }
        });

    </script> --}}
