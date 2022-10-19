<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Kategori Pekerjaan</h4>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form-modal-add">
                    Tambah Kategori Pekerjaan
                </button>

             </div>
             <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped text-center" >
                      <thead class="">
                         <tr>
                            <th>No.</th>
                            <th>Nama Kategori Pekerjaan</th>
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
</x-app-layout>
<!-- Modal Add-->
<div class="modal fade" data-backdrop="static" id="form-modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-md" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Form Tambah kategori</h5>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                      <label for="in-type">Nama kategori</label>
                      <input type="text" class="form-control" id="kategori">
                      <small class="form-text text-danger"></small>
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
                    <h5 class="modal-title">Form Edit kategori</h5>
                </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                      <label for="kategori">Nama kategori</label>
                      <input type="text" class="form-control" id="kat" placeholder="">
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
            getKategoriPekerjaan();

            $('#btn-save-add').on('click', function(){
                $.ajax({
                    type: "POST",
                    url: "{{ route('kategoripekerjaan.store') }}",
                    data: {
                        'nama_kategori': $('#kategori').val(),
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.code === 200) {
                            $('#kategori').val('');
                        }
                        $(document).find('#form-modal-add').find('#btn-close-add').click();
                        getKategoriPekerjaan();
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
                    }
                });
            });

            $(document).on('click', '#update-btn', function() {
                const thisIs = $(this);
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ url('kategoripekerjaan') }}/"+id,
                    dataType: "JSON",
                    success: function (response) {
                        $('#kat').val(response.data.nama_kategori);
                        $(thisIs).parents(document).find('#btn-close-edit').on('click', function(){
                            id = null;
                        });
                        $(thisIs).parents(document).find('#btn-save-edit').on('click', function(){
                            $.ajax({
                                type: "POST",
                                url: "{{ url('kategoripekerjaan') }}/"+id,
                                data: {
                                    'nama_kategori': $('#kat').val(),
                                    '_method': 'PUT',
                                    '_token': '{{ csrf_token() }}'
                                },
                                success: function (response) {
                                    $(thisIs).parents(document).find('#form-modal-edit').find('#btn-close-edit').click();
                                    getKategoriPekerjaan();
                                    if(response.code === 200){
                                        id = null;
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
                            'url': '{{url('kategoripekerjaan')}}/' + id,
                            'type': 'POST',
                            'data': {
                                '_method': 'DELETE',
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.message) {
                                    getKategoriPekerjaan();
                                    return toastr.success(response.message, 'Success!', {
                                        closeButton: true,
                                        tapToDismiss: true
                                    });
                                }
                                    getKategoriPekerjaan();
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


            function getKategoriPekerjaan() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('isikategoripekerjaan') }}",
                    dataType: "JSON",
                    success: function (response) {
                        let rows = '';
                        $.each(response.data, function (idx, data) {
                            idx++
                            rows += '<tr>'+
                                        '<td>'+idx+'</td>'+
                                        '<td>'+data.nama_kategori+'</td>'+
                                        '<td>'+
                                            '<div class="row justify-content-around">'+
                                                '<div class="col-4">'+
                                                    '<button class="btn btn-warning" id="update-btn" href="#" data-id="'+data.id+'" data-bs-toggle="modal" data-bs-target="#form-modal-edit">'+
                                                            '<span>Edit</span>'+
                                                    '</button>'+
                                                '</div>'+
                                                '<div class="col-4">'+
                                                    '<button class="btn btn-danger" id="del-btn" href="#" data-id="'+data.id+'">'+
                                                        '<span>Hapus</span>'+
                                                    '</button>'+
                                                '</div>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';
                        });
                        $('#list').html('');
                        $('#list').append(rows);
                        if (feather) {
                            feather.replace({
                                width: 14,
                                height: 14
                            });
                        }
                    }
                });
            }
        });

    </script>
