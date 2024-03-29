<!-- CSS only -->
<head>
    <title>List Lowongan Kerja</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Lowongan Kerja</h4>
                </div>
            </div>
            <div class="d-flex justify-content-end my-2 me-4">
                <a class="btn btn-primary" href="{{route('lowongan-kerja.create')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Tambah Lowongan
                </a>
            </div>
             <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable2" class="table table-striped text-center">
                      <thead class="w-100">
                         <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Perusahaan</th>
                            <th class="text-center">Bidang</th>
                            <th class="text-center">Status</th>
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
    <script>
        $(document).ready(function () {
            getLoker();


            $(document).on('click', '#del-btn', function () {
                var id = $(this).data('id');
                Swal.fire({
                    icon: 'question',
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


            function getLoker() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('listLoker') }}",
                    dataType: "JSON",
                    success: function (response) {
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data,  // Get the data object
                            columns: [
                                { 'data': 'nama_lowongan' },
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
                                { 'data': 'bidangs.nama_jurusan' },
                                { 'data': 'status', render : function(data , type, row, meta){
                                    return type === 'display' ?
                                    '<span class="badge rounded-pill '+(data === 'Aktif' ? 'bg-success' : 'bg-danger')+' p-2">'+data+'</span>':
                                    data;
                                } },
                                {'data' : "id" , render : function ( data, type, row, meta ) {
                                return type === 'display'  ?
                                '<div class="d-flex justify-content-center">'+
                                    '<div class="col-4">'+
                                        '<a class="btn btn-primary btn-sm" id="show-btn" href="{{url('lowongan-kerja/')}}/'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>'+
                                        '</a>'+
                                    '</div>'+
                                    '<div class="col-4">'+
                                        '<a class="btn btn-warning btn-sm" id="update-btn" href="{{url('lowongan-kerja/update')}}/'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>'+
                                        '</a>'+
                                    '</div>'+
                                    '<div class="col-4">'+
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
