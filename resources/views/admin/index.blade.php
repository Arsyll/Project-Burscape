<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Admin</h4>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form-modal-add">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Tambah Admin
                </button>

             </div>
             <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable2" class="table table-striped text-center">
                      <thead class="w-100">
                         <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Jabatan</th>
                            <th class="w-25 text-center">Aksi</th>
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
</x-app-layout>
<!-- Modal Add-->
<div class="modal fade" data-backdrop="static" id="form-modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Admin</h5>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                          <div><span class="text-danger" id="nama_lengkap_error"></span></div>
                          <label for="jurusan">Nama Lengkap<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="nama_lengkap" placeholder="">
                          <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="email_error"></span></div>
                            <label for="jurusan">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="jabatan_error"></span></div>
                            <label for="jurusan">Jabatan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="jabatan" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="password_error"></span></div>
                            <label for="jurusan">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="con_password" placeholder="">
                            <small class="form-text text-danger"></small>
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
                    <h5 class="modal-title">Edit Admin</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <div><span class="text-danger" id="update_nama_error"></span></div>
                            <label for="jurusan">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="update_nama_lengkap" placeholder="">
                            <small class="form-text text-danger"></small>
                          </div>
                          <div class="form-group">
                              <div><span class="text-danger" id="update_email_error"></span></div>
                              <label for="jurusan">Email<span class="text-danger">*</span></label>
                              <input type="email" class="form-control" id="update_email" placeholder="">
                              <small class="form-text text-danger"></small>
                          </div>
                          <div class="form-group">
                                <div><span class="text-danger" id="update_jabatan_error"></span></div>
                                <label for="jurusan">Jabatan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="update_jabatan" placeholder="">
                                <small class="form-text text-danger"></small>
                            </div>
                          <div class="form-group">
                              <div><span class="text-danger" id="update_password_error"></span></div>
                              <label for="jurusan">Password<span class="text-danger">*</span></label>
                              <input type="password" class="form-control" id="update_password" placeholder="">
                              <small class="form-text text-danger"></small>
                          </div>
                          <div class="form-group">
                              <label for="jurusan">Confirm Password<span class="text-danger">*</span></label>
                              <input type="password" class="form-control" id="update_con_password" placeholder="">
                              <small class="form-text text-danger"></small>
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
    <script>
        $(document).ready(function () {
            getAdmin();

            $('#btn-save-add').on('click', function(){
                var nama = $('#nama_lengkap').val();
                var email = $('#email').val();
                var jabatan = $('#jabatan').val();
                var pass = $('#password').val();
                var conPass = $('#con_password').val();
                var fd = new FormData();
                fd.append('nama_lengkap',nama);
                fd.append('email',email);
                fd.append('jabatan',jabatan);
                fd.append('password',pass);
                fd.append('con_password',conPass);
                fd.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    type: "POST",
                    enctype:"multipart/form-data",
                    url: "{{ route('admin.store') }}",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.code === 200) {
                            $('#nama_lengkap').val('');
                            $('#email').val('');
                            $('#jabatan').val('');
                            $('#password').val('');
                            $('#con_password').val('');
                        }
                        $(document).find('#form-modal-add').find('#btn-close-add').click();
                        getAdmin();
                        if(response.code == 200){
                            return toastr.success(response.message, 'Success!', {
                                closeButton: true,
                                tapToDismiss: true
                            });
                        }
                        $.each(response.error, function (idx, err) {
                                toastr.error(err, 'Error!', {
                                closeButton: true,
                                tapToDismiss: true
                            });
                        });
                    },
                    error:function (reject) {
                        if( reject.status === 422 ) {
                            clearErrorMessages();
                            var message = $.parseJSON(reject.responseText);
                            var errors = message['errors'];
                            console.log(errors)
                            $.each(errors, function (key, val) {
                                console.log(key)
                                $("#" + key + "_error").text(val[0]);
                            });
                            $('#btn-close-add').on('click', function(){
                                clearErrorMessages();

                            });
                        }
                    }
                });
            });

            $(document).on('click', '#update-btn', function() {
                const thisIs = $(this);
                var id = $(this).data('id');
                console.log(id)
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin') }}/"+id,
                    dataType: "JSON",
                    success: function (response) {
                        // Set Data
                        console.log(response.data);
                        $('#update_nama_lengkap').val(response.data.nama_lengkap);
                        $('#update_email').val(response.data.admin_role.user.email);
                        $('#update_jabatan').val(response.data.jabatan);
                        $(thisIs).parents(document).find('#btn-close-edit').on('click', function(){
                            id = null;
                        });
                        $(thisIs).parents(document).find('#btn-save-edit').on('click', function(){
                            var nama = $('#update_nama_lengkap').val();
                            var email = $('#update_email').val();
                            var jabatan = $('#update_jabatan').val();
                            var pass = $('#update_password').val();
                            var conPass = $('#update_con_password').val();
                            var fd = new FormData();
                            fd.append('nama_lengkap',nama);
                            fd.append('email',email);
                            fd.append('jabatan',jabatan);
                            fd.append('password',pass);
                            fd.append('con_password',conPass);
                            fd.append('_token', '{{ csrf_token() }}');
                            fd.append('_method', 'PUT');
                            $.ajax({
                                type: "POST",
                                enctype:"multipart/form-data",
                                url: "{{ url('admin') }}/"+id,
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    $(thisIs).parents(document).find('#form-modal-edit').find('#btn-close-edit').click();
                                    clearErrorMessages();
                                    getAdmin();
                                    if(response.code === 200){
                                        id = null;
                                        $('#update_password').val('');
                                        $('#update_con_password').val('');
                                        return toastr.success(response.message, 'Success!', {
                                            closeButton: true,
                                            tapToDismiss: true
                                        });
                                    }
                                    $.each(response.error, function (idx, err) {
                                        toastr.error(err, 'Error!', {
                                            closeButton: true,
                                            tapToDismiss: true
                                        });
                                    });
                                },
                                error:function (reject) {
                                    if( reject.status === 422 ) {
                                        clearErrorMessages();
                                        var message = $.parseJSON(reject.responseText);
                                        var errors = message['errors'];
                                        $.each(errors, function (key, val) {
                                            console.log(key)
                                            $("#update_" + key + "_error").text(val[0]);
                                        });
                                        $('#btn-close-edit').on('click', function(){
                                            clearErrorMessages();

                                        });
                                    }
                                }
                            });
                        });
                    }
                });
            });

            // Later On 

            // $(document).on('click', '#del-btn', function () {
            //     var id = $(this).data('id');
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         type: 'error',
            //         showCancelButton: true,
            //         confirmButtonColor: '#28C76F',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     })
            //     .then((result) => {
            //         if (result.value) {
            //             $.ajax({
            //                 'url': '{{url('admin')}}/' + id,
            //                 'type': 'POST',
            //                 'data': {
            //                     '_method': 'DELETE',
            //                     '_token': '{{csrf_token()}}'
            //                 },
            //                 success: function (response) {
            //                     if (response.message) {
            //                         getAdmin();
            //                         return toastr.success(response.message, 'Success!', {
            //                             closeButton: true,
            //                             tapToDismiss: true
            //                         });
            //                     }
            //                         getAdmin();
            //                         return toastr.error('Failed!', 'Failed!', {
            //                             closeButton: true,
            //                             tapToDismiss: true
            //                         });
            //                 }
            //             });
            //         } else {
            //             console.log(`dialog was dismissed by ${result.dismiss}`)
            //         }
            //     });
            // });

            function clearErrorMessages(){
                $(document).find('#form-modal-add').find('#nama_lengkap_error').text("");
                $(document).find('#form-modal-add').find('#email_error').text("");
                $(document).find('#form-modal-add').find('#jabatan_error').text("");
                $(document).find('#form-modal-add').find('#password_error').text("");
                $(document).find('#form-modal-edit').find('#update_nama_error_error').text("");
                $(document).find('#form-modal-edit').find('#update_email_error').text("");
                $(document).find('#form-modal-edit').find('#update_jabatan_error').text("");
                $(document).find('#form-modal-edit').find('#update_password_error').text("");
            }

            function getAdmin() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('listAdmin') }}",
                    dataType: "JSON",
                    success: function (response) {
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data.original.data,  // Get the data object
                            columns: [
                                { 'data': 'nama_lengkap' },
                                { 'data': 'email' },
                                { 'data': 'jabatan' },
                                { 'data': 'email' },
                                
                            ]
                        });
                        $table.destroy()
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data.original.data,  // Get the data object
                            columns: [
                                { 'data': 'nama_lengkap' },
                                { 'data': 'email' },
                                { 'data': 'jabatan' },
                                {'data' : "id" , render : function ( data, type, row, meta ) {
                                return type === 'display'  ?
                                '<div class="row justify-content-center">'+
                                    '<div class="col-3">'+
                                        '<button class="btn btn-warning btn-sm" id="update-btn" href="#" data-id="'+data+'" data-bs-toggle="modal" data-bs-target="#form-modal-edit">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>'+
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
                    }
                });
            }
        });

    </script>
