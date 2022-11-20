<!-- CSS only -->
<head>
    <title>List Perusahaan</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Perusahaan</h4>
                </div>
                <a class="btn btn-primary" href="{{route('perusahaan.create')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Tambah Perusahaan
                </a>

             </div>
             <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable2" class="table table-striped text-center">
                      <thead class="w-100">
                         <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Bidang</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">No Telp</th>
                            <th class="text-center">Alamat</th>
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
                            'url': '{{url('perusahaan')}}/' + id,
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
                    url: "{{ url('listPerusahaan') }}",
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
                            ]
                        });

                        $table.destroy();

                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data,  // Get the data object
                            columns: [
                                { 'data': 'nama' },
                                { 'data': 'bidang' },
                                { 'data': 'email_perusahaan' },
                                { 'data': 'no_telp' },
                                { 'data': 'alamat' },
                                {'data' : "id" , render : function ( data, type, row, meta ) {
                                return type === 'display'  ?
                                '<div class="row justify-content-center">'+
                                    '<div class="col-3">'+
                                        '<a class="btn btn-primary btn-sm" id="show-btn" href="{{url('perusahaan/')}}/'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>'+
                                        '</a>'+
                                    '</div>'+
                                    '<div class="col-3">'+
                                        '<a class="btn btn-warning btn-sm" id="update-btn" href="{{url('perusahaan/update')}}/'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>'+
                                        '</a>'+
                                    '</div>'+
                                    '<div class="col-3">'+
                                        '<button class="btn btn-danger btn-sm" id="del-btn" href="#" data-id="'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>'+
                                        '</button>'+
                                    '</div>'+
                                '</div>' :
                                    data;
                                }},                             
                            ],
                            'columnDefs': [ {
                                'targets': [5], 
                                'orderable': false,
                            }]
                        });
                    }
                });
            }
        });

    </script>
