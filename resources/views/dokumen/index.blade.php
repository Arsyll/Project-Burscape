<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Dokumen</h4>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form-modal-add">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Tambah Dokumen
                </button>

             </div>
             <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable2" class="table table-striped text-center">
                      <thead class="w-100">
                         <tr>
                            <th class="text-center">No Dokumen</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Perusahaan</th>
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
                <h5 class="modal-title">Tambah Perusahaan</h5>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                          <div><span class="text-danger" id="no_doc_error"></span></div>
                          <label for="jurusan">No Dokumen<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="no_doc" placeholder="">
                          <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="name_doc_error"></span></div>
                            <label for="jurusan">Nama Dokumen<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name_doc" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="type_doc_error"></span></div>
                            <label for="jurusan">Tipe<span class="text-danger">*</span></label>
                            <select class="form form-control" name="type_doc" id="type_doc">
                                <option value="">- Pilih -</option>
                                <option value="MOU">MOU</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="id_perusahaan_error"></span></div>
                            <label for="jurusan">Perusahaan</label>
                            <select class="form form-control" name="id_perusahaan" id="id_perusahaan">
                                <option value="">- Pilih -</option>
                                <option value="1">Some Workshop</option>
                                <option value="2">Lainnya</option>
                            </select>
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="id_loker_error"></span></div>
                            <label for="jurusan">Lowongan Kerja</label>
                            <select class="form form-control" name="id_loker" id="id_loker">
                                <option value="">- Pilih -</option>
                                <option value="1">LOker Some Workshop</option>
                                <option value="2">Lainnya</option>
                            </select>
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="file_doc_error"></span></div>
                            <label for="jurusan">File Dokumen<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="file_doc" placeholder="">
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
                    <h5 class="modal-title">Edit Dokumen</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <div><span class="text-danger" id="update_no_doc_error"></span></div>
                          <label for="jurusan">No Dokumen<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="uno_doc" placeholder="">
                          <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="update_name_doc_error"></span></div>
                            <label for="jurusan">Nama Dokumen<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="uname_doc" placeholder="">
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="update_type_doc_error"></span></div>
                            <label for="jurusan">Tipe<span class="text-danger">*</span></label>
                            <select class="form form-control" name="utype_doc" id="utype_doc">
                                <option value="">- Pilih -</option>
                                <option value="MOU">MOU</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Perusahaan</label>
                            <select class="form form-control" name="uid_perusahaan" id="uid_perusahaan">
                                <option value="">- Pilih -</option>
                                <option value="1">Some Workshop</option>
                                <option value="2">Lainnya</option>
                            </select>
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Lowongan Kerja</label>
                            <select class="form form-control" name="uid_loker" id="uid_loker">
                                <option value="">- Pilih -</option>
                                <option value="1">LOker Some Workshop</option>
                                <option value="2">Lainnya</option>
                            </select>
                            <small class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <div><span class="text-danger" id="update_file_doc_error"></span></div>
                            <label for="jurusan">File Dokumen</label>
                            <input type="file" class="form-control" id="ufile_doc" placeholder="">
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
            getDokumen();

            $('#btn-save-add').on('click', function(){
                var file = $('#file_doc').prop('files')[0];
                var name_doc = $('#name_doc').val();
                var no_doc = $('#no_doc').val();
                var type_doc = $('select[name=type_doc] option').filter(':selected').val();
                var id_loker = $('select[name=id_loker] option').filter(':selected').val();
                var id_perusahaan = $('select[name=id_perusahaan] option').filter(':selected').val();
                var fd = new FormData();
                fd.append('file_doc',file);
                fd.append('name_doc',name_doc);
                fd.append('no_doc',no_doc);
                fd.append('type_doc',type_doc);
                fd.append('id_loker',id_loker);
                fd.append('id_perusahaan',id_perusahaan);
                fd.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    type: "POST",
                    enctype:"multipart/form-data",
                    url: "{{ route('dokumen.store') }}",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.code === 200) {
                            $('#name_doc').val('');
                            $('#no_doc').val('');
                            $('#type_doc').val('');
                            $('#file_doc').val('');
                            $('#id_loker').val('');
                            $('#id_perusahaan').val('');
                        }
                        $(document).find('#form-modal-add').find('#btn-close-add').click();
                        getDokumen();
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
                    url: "{{ url('dokumen') }}/"+id,
                    dataType: "JSON",
                    success: function (response) {
                        // Set Data
                        $('#uname_doc').val(response.data.name_doc);
                        $('#uno_doc').val(response.data.no_doc);
                        $('#utype_doc').val(response.data.type_doc);
                        $('#uid_perusahaan').val(response.data.id_perusahaan);
                        $('#uid_loker').val(response.data.id_loker);
                        $(thisIs).parents(document).find('#btn-close-edit').on('click', function(){
                            id = null;
                        });
                        $(thisIs).parents(document).find('#btn-save-edit').on('click', function(){
                            var file = $('#ufile_doc').prop('files')[0];
                            var name_doc = $('#uname_doc').val();
                            var no_doc = $('#uno_doc').val();
                            var type_doc = $('select[name=utype_doc] option').filter(':selected').val();
                            var id_loker = $('select[name=uid_loker] option').filter(':selected').val();
                            var id_perusahaan = $('select[name=uid_perusahaan] option').filter(':selected').val();
                            var fd = new FormData();
                            fd.append('file_doc',file);
                            fd.append('name_doc',name_doc);
                            fd.append('no_doc',no_doc);
                            fd.append('type_doc',type_doc);
                            fd.append('id_loker',id_loker);
                            fd.append('id_perusahaan',id_perusahaan);
                            fd.append('_token', '{{ csrf_token() }}');
                            fd.append('_method', 'PUT');
                            $.ajax({
                                type: "POST",
                                enctype:"multipart/form-data",
                                url: "{{ url('dokumen') }}/"+id,
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    $(thisIs).parents(document).find('#form-modal-edit').find('#btn-close-edit').click();
                                    clearErrorMessages();
                                    getDokumen();
                                    if(response.code === 200){
                                        id = null;
                                        $('#ufile_doc').val('');
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
                            'url': '{{url('dokumen')}}/' + id,
                            'type': 'POST',
                            'data': {
                                '_method': 'DELETE',
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.message) {
                                    getDokumen();
                                    return toastr.success(response.message, 'Success!', {
                                        closeButton: true,
                                        tapToDismiss: true
                                    });
                                }
                                    getDokumen();
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

            function getDokumen() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('listDokumen') }}",
                    dataType: "JSON",
                    success: function (response) {
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data.original.data,  // Get the data object
                            columns: [
                                { 'data': 'no_doc' },
                                { 'data': 'name_doc' },
                                { 'data': 'type_doc' },
                                { 'data': 'id_perusahaan' },
                                { 'data': 'id_perusahaan' },
                                
                            ]
                        });
                        $table.destroy()
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data.original.data,  // Get the data object
                            columns: [
                                { 'data': 'no_doc' },
                                { 'data': 'name_doc' },
                                { 'data': 'type_doc' },
                                { 'data' : 'perusahaan' },
                                {'data' : "id" , render : function ( data, type, row, meta ) {
                                return type === 'display'  ?
                                '<div class="row justify-content-center">'+
                                    '<div class="col-3">'+
                                        '<a class="btn btn-primary btn-sm" id="download-btn" href="{{url('dokumen/download')}}/'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>'+
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
                                'targets': [4], 
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

    </script>
