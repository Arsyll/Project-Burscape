<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Alumni</h4>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form-modal-add">
                    Tambah Alumni
                </button>
             </div>
             <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable2" class="table table-striped text-center" >
                      <thead>
                         <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
                         </tr>
                      </thead>
                        <tbody id='list'>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped text-center">
                            <thead class="">
                                <tr>
                                    <th>No.</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Jurusan</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id='list'>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            getAlumni();

            $('#btn-save-add').on('click', function(){
                var foto = $('#cfoto').prop('files')[0];
                var name = $('#cname').val();
                var telp = $('#ctelp').val();
                var ttl = $('#cttl').val();
                var alamat = $('#calamat').val();
                var email = $('#cemail').val();
                var pass = $('#cpassword').val();
                var conPass = $('#cconfirm').val();
                var status = $('select[name=cstatus] option').filter(':selected').val();
                var jurusan = $('select[name=cid_jurusan] option').filter(':selected').val();
                var fd = new FormData();
                if (foto != null) {fd.append('foto_profile',foto);}
                fd.append('nama',name);
                fd.append('no_telp',telp);
                fd.append('tanggal_lahir',ttl);
                fd.append('alamat',alamat);
                fd.append('status',status);
                fd.append('id_jurusan',jurusan);
                fd.append('email',email);
                fd.append('password',pass);
                fd.append('password_confirmation',conPass);
                fd.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    type: "POST",
                    url: "{{ route('alumni.store') }}",
                    data: fd,
                    processData: false,
                    contentType: false,
                    enctype:"multipart/form-data",
                    success: function (response) {
                        if (response.code === 200) {
                            $('#cname').val('');
                            $('#ctelp').val('');
                            $('#cttl').val('');
                            $('#calamat').val('');
                            $('#cstatus').val('');
                            $('#cfoto').val('');
                            $('#cid_jurusan').val('');
                            $('#cemail').val('');
                            $('#cpassword').val('');
                            $('#cconfirm').val('');
                        }
                        $(document).find('#form-modal-add').find('#btn-close-add').click();
                        getAlumni();
                        // if(response.code == 200){
                        //     return toastr.success(response.message, 'Success!', {
                        //         closeButton: true,
                        //         tapToDismiss: true
                        //     });
                        // }
                        // $.each(response.error, function (idx, err) {
                        //         toastr.error(err, 'Error!', {
                        //         closeButton: true,
                        //         tapToDismiss: true
                        //     });
                        // });
                    },
                    error:function (reject) {
                        if( reject.status === 422 ) {
                            clearErrorMessages();
                            var message = $.parseJSON(reject.responseText);
                            var errors = message['errors'];
                            $.each(errors, function (key, val) {
                                $("#" + key + "_error").text(val[0]);
                            });
                            $('#btn-close-add').on('click', function(){
                                clearErrorMessages();

                            });
                        }
                    }

                });
            });
        });

            $(document).on('click', '#update-btn', function() {
                const thisIs = $(this);
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ url('alumni') }}/"+id,
                    dataType: "JSON",
                    success: function (response) {
                        // Set Data
                        $('#name').val(response.data.nama);
                        $('#telp').val(response.data.no_telp);
                        $('#ttl').val(response.data.tanggal_lahir);
                        $('#alamat').val(response.data.alamat);
                        $('#status').val(response.data.status);
                        $('#id_jurusan').val(response.data.id_jurusan);
                        $('#email').val(response.data.role_alumni.user.email);
                        $(thisIs).parents(document).find('#btn-close-edit').on('click', function(){
                            id = null;
                            $('#foto').val('');
                            $('#password').val('');
                            $('#conpassword').val('');
                        });
                        $(thisIs).parents(document).find('#btn-save-edit').on('click', function(){
                            var foto = $('#foto').prop('files')[0];
                            var name = $('#name').val();
                            var telp = $('#telp').val();
                            var ttl = $('#ttl').val();
                            var alamat = $('#alamat').val();
                            var email = $('#email').val();
                            var password = $('#password').val();
                            var conpassword = $('#confirm').val();
                            var status = $('select[name=status] option').filter(':selected').val();
                            var jurusan = $('select[name=id_jurusan] option').filter(':selected').val();
                            var fd = new FormData();
                            if (foto != null) {fd.append('foto_profile',foto);}
                            if (email != null) {fd.append('email',email);}
                            if (password != null) {fd.append('password',password);}
                            if (conpassword != null) {fd.append('password_confirmation',conpassword);}
                            fd.append('nama',name);
                            fd.append('no_telp',telp);
                            fd.append('tanggal_lahir',ttl);
                            fd.append('alamat',alamat);
                            fd.append('status',status);
                            fd.append('id_jurusan',jurusan);
                            fd.append('_token', '{{ csrf_token() }}');
                            fd.append('_method', 'PUT');
                            $.ajax({
                                type: "POST",
                                url: "{{ url('alumni') }}/"+id,
                                data: fd,
                                processData: false,
                                contentType: false,
                                enctype:"multipart/form-data",
                                success: function (response) {
                                    $(thisIs).parents(document).find('#form-modal-edit').find('#btn-close-edit').click();
                                    getAlumni();
                                    if(response.code === 200){
                                        id = null;
                                        clearErrorMessages();
                                        $('#foto').val('');
                                        $('#password').val('');
                                        $('#conpassword').val('');
                                        return toastr.success(response.message, 'Success!', {
                                            closeButton: true,
                                            tapToDismiss: true
                                        });
                                    }
                                },
                                error:function (reject) {
                                    if( reject.status === 422 ) {
                                        clearErrorMessages();
                                        var message = $.parseJSON(reject.responseText);
                                        var errors = message['errors'];
                                        $.each(errors, function (key, val) {
                                            $("#update_" + key + "_error").text(val[0]);
                                        });
                                        $('#btn-close-add').on('click', function(){
                                            clearErrorMessages();

                                        });
                                    }
                                }
                            });
                        });
                }
            });
        });

        $(document).on('click', '#del-btn', function() {
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
                            'url': '{{ url('alumni') }}/' + id,
                            'type': 'POST',
                            'data': {
                                '_method': 'DELETE',
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.message) {
                                    getAlumni();
                                    return toastr.success(response.message, 'Success!', {
                                        closeButton: true,
                                        tapToDismiss: true
                                    });
                                }
                                    getAlumni();
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
                $(document).find('#form-modal-add').find('#nama_error').text("");
                $(document).find('#form-modal-add').find('#no_telp_error').text("");
                $(document).find('#form-modal-add').find('#id_jurusan_error').text("");
                $(document).find('#form-modal-add').find('#alamat_error').text("");
                $(document).find('#form-modal-add').find('#status_error').text("");
                $(document).find('#form-modal-add').find('#tanggal_lahir_error').text("");
                $(document).find('#form-modal-add').find('#password_error').text("");
                $(document).find('#form-modal-add').find('#email_error').text("");
                $(document).find('#form-modal-add').find('#update_nama_error').text("");
                $(document).find('#form-modal-add').find('#update_no_telp_error').text("");
                $(document).find('#form-modal-add').find('#update_id_jurusan_error').text("");
                $(document).find('#form-modal-add').find('#update_alamat_error').text("");
                $(document).find('#form-modal-add').find('#update_status_error').text("");
                $(document).find('#form-modal-add').find('#update_tanggal_lahir_error').text("");
                $(document).find('#form-modal-add').find('#update_password_error').text("");
                $(document).find('#form-modal-add').find('#update_email_error').text("");
                // $(document).find('#form-modal-add').find('#password_error').text("");
                // $(document).find('#form-modal-edit').find('#update_nama_error_error').text("");
                // $(document).find('#form-modal-edit').find('#update_email_error').text("");
                // $(document).find('#form-modal-edit').find('#update_jabatan_error').text("");
                // $(document).find('#form-modal-edit').find('#update_password_error').text("");
            }

            function getAlumni() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('listAlumni') }}",
                    dataType: "JSON",
                    success: function (response) {
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data,  // Get the data object
                            columns: [
                                {'data' : 'nama'},
                                {'data' : 'nama'},
                                {'data' : 'nama'},
                                {'data' : 'nama'},
                                {'data' : 'nama'},
                                {'data' : 'nama'},
                            ]
                        });

                        $table.destroy();

                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data,  // Get the data object
                            columns: [
                                { 'data': 'nama' },
                                { 'data': 'foto_profile', render : function (data,type,row,meta){
                                    refreshFsLightbox();
                                    return data ?
                                    '<a data-fslightbox="profile" href="{{asset("storage/profile_alumni")}}/'+data+'">'+
                                        '<img src="{{asset("storage/profile_alumni")}}/'+data+'" class="img-fluid bg-soft-info rounded" alt="profile-image">'+
                                    '</a>' : '<a data-fslightbox="profile" href="{{asset("images/avatars/01.png")}}">'+
                                        '<img src="{{asset("images/avatars/01.png")}}" class="img-fluid bg-soft-info rounded" alt="profile-image">'+
                                    '</a>'
                                } },
                                { 'data': 'status' },
                                { 'data': 'jurusan.nama_jurusan' },
                                { 'data': 'alamat' },
                                {'data' : "id" , render : function ( data, type, row, meta ) {
                                return type === 'display'  ?
                                '<div class="d-flex justify-content-center">'+
                                                '<div class="col-6 me-1">'+
                                                    '<button class="btn btn-warning btn-sm" id="update-btn" href="#" data-id="'+data+'" data-bs-toggle="modal" data-bs-target="#form-modal-edit">'+
                                                        '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>'+
                                                    '</button>'+
                                                '</div>'+
                                                '<div class="col-6">'+
                                                    '<button class="btn btn-danger btn-sm" id="del-btn" href="#" data-id="'+data+'">'+
                                                        '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>'+
                                                    '</button>'+
                                                '</div>'+
                                            '</div>'
                                            :
                                    data;
                                }},
                            ],
                            'columnDefs': [ {
                                'targets': [1,5],
                                'orderable': false,
                            }]
                        });

                        $table.on('draw.dt', function(){
                            refreshFsLightbox();
                        })
                    }
                });



                // $.ajax({
                //     type: "GET",
                //     url: "{{ url('listAlumni') }}",
                //     dataType: "JSON",
                //     success: function (response) {
                //         let rows = '';
                //         $.each(response.data, function (idx, data) {
                //             idx++
                //             rows += '<tr>'+
                //                         '<td>'+idx+'</td>'+
                //                         '<td>'+'</td>'+
                //                         '<td>'+data.nama+'</td>'+
                //                         '<td>'+data.status+'</td>'+
                //                         '<td>'+data.jurusan.nama_jurusan+'</td>'+
                //                         '<td>'+data.alamat+'</td>'+
                //                         '<td>'+
                //                             '<div class="d-flex justify-content-center">'+
                //                                 '<div class="col-6 me-1">'+
                //                                     '<button class="btn btn-warning btn-sm" id="update-btn" href="#" data-id="'+data.id+'" data-bs-toggle="modal" data-bs-target="#form-modal-edit">'+
                //                                         '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>'+
                //                                     '</button>'+
                //                                 '</div>'+
                //                                 '<div class="col-6">'+
                //                                     '<button class="btn btn-danger btn-sm" id="del-btn" href="#" data-id="'+data.id+'">'+
                //                                         '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>'+
                //                                     '</button>'+
                //                                 '</div>'+
                //                             '</div>'+
                //                         '</td>'
                //                     '</tr>';
                //         });
                //         $('#list').html('');
                //         $('#list').append(rows);
                //         if (feather) {
                //             feather.replace({
                //                 width: 14,
                //                 height: 14
                //             });
                //         }
                //     }
                // });

            }
        });

    </script>


</x-app-layout>
<!-- Modal Add-->
<div class="modal fade" data-backdrop="static" id="form-modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-md" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Tambah Alumni</h5>
                    </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <div><span class="text-danger" id="nama_error"></span></div>
                            <label for="jurusan">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cname" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="no_telp_error"></span></div>
                            <label for="jurusan">No Telp<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="ctelp" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="tanggal_lahir_error"></span></div>
                            <label for="jurusan">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="cttl" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="alamat_error"></span></div>
                            <label for="jurusan">Alamat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="calamat" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="status_error"></span></div>
                            <label for="jurusan">Status<span class="text-danger">*</span></label>
                            <select class="form form-control" name="cstatus" id="cstatus">
                                <option value="">- Pilih -</option>
                                <option value="Kuliah">Kuliah</option>
                                <option value="Bekerja">Bekerja</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Menganggur">Menganggur</option>
                            </select>
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan<span class="text-danger">*</span></label>
                            <div><span class="text-danger" id="id_jurusan_error"></span></div>
                            <select class="form form-control" name="cid_jurusan" id="cid_jurusan">
                                <option value="">- Pilih -</option>
                                @foreach ($jurusans as $jurusan)
                                <option value="{{$jurusan->id}}">{{$jurusan->nama_jurusan}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="foto_profile_error"></span></div>
                            <label for="jurusan">Foto PAS</label>
                            <input type="file" class="form-control" id="cfoto" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <hr>
                        <h5>Akun Alumni</h5>
                        <hr>
                        <div class="form-group">
                            <div><span class="text-danger" id="email_error"></span></div>
                            <label for="jurusan">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="cemail" placeholder="">
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="password_error"></span></div>
                            <label for="jurusan">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="cpassword" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="cconfirm" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-close-add" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="btn-save-add" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Update-->
<div class="modal fade" data-backdrop="static" id="form-modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-md" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Alumni</h5>
                </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <div><span class="text-danger" id="update_nama_error"></span></div>
                      <label for="jurusan">Nama</label>
                      <input type="text" class="form-control" id="name" placeholder="">
                      <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div><span class="text-danger" id="update_no_telp_error"></span></div>
                        <label for="jurusan">No Telp</label>
                        <input type="number" class="form-control" id="telp" placeholder="">
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div><span class="text-danger" id="update_tanggal_lahir_error"></span></div>
                        <label for="jurusan">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="ttl" placeholder="">
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div><span class="text-danger" id="update_alamat_error"></span></div>
                        <label for="jurusan">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="">
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div><span class="text-danger" id="update_status_error"></span></div>
                        <label for="jurusan">Status</label>
                        <select class="form form-control" name="status" id="status">
                            <option value="">- Pilih -</option>
                            <option value="Kuliah">Kuliah</option>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Wirausaha">Wirausaha</option>
                            <option value="Menganggur">Menganggur</option>
                        </select>
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div><span class="text-danger" id="update_id_jurusan_error"></span></div>
                        <label for="jurusan">Jurusan</label>
                        <select class="form form-control" name="id_jurusan" id="id_jurusan">
                            <option value="">- Pilih -</option>
                            @foreach ($jurusans as $jurusan)
                            <option value="{{$jurusan->id}}">{{$jurusan->nama_jurusan}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div><span class="text-danger" id="update_foto_profile_error"></span></div>
                        <label for="jurusan">Foto PAS</label>
                        <input type="file" class="form-control" id="foto" placeholder="">
                        <small class="form-text text-danger"></small>
                    </div>
                    <hr>
                    <h5>Akun Alumni</h5>
                    <hr>
                    <div class="form-group">
                        <div><span class="text-danger" id="update_email_error"></span></div>
                        <label for="jurusan">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <div><span class="text-danger" id="update_password_error"></span></div>
                        <label for="jurusan">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm" placeholder="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-close-edit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="btn-save-edit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
