<!-- CSS only -->
<head>
    <title>List Lamaran Kerja</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<x-app-layout :assets="$assets ?? []">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Lamaran Kerja</h4>
                </div>

             </div>
             <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable2" class="table table-striped text-center">
                      <thead class="w-100">
                         <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">No Telp</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
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
            getLamaran();


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
            //                 'url': '{{url('lowongan-kerja')}}/' + id,
            //                 'type': 'POST',
            //                 'data': {
            //                     '_method': 'DELETE',
            //                     '_token': '{{csrf_token()}}'
            //                 },
            //                 success: function (response) {
            //                     if (response.message) {
            //                         getLamaran();
            //                         return toastr.success(response.message, 'Success!', {
            //                             closeButton: true,
            //                             tapToDismiss: true
            //                         });
            //                     }
            //                         getLamaran();
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


            function getLamaran() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('listLamaran?id='.$id) }}",
                    dataType: "JSON",
                    success: function (response) {
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data,  // Get the data object
                            columns: [
                                { 'data': 'email' },
                                { 'data': 'email' },
                                { 'data': 'email' },
                                { 'data': 'email' },
                                { 'data': 'email' },
                                
                            ]
                        });
                        $table.destroy()
                        $table = $('#datatable2').DataTable({
                            retrieve: true,
                            data: response.data,  // Get the data object
                            columns: [
                                { 'data': 'alumni.nama' },
                                { 'data': 'email' },
                                { 'data': 'no_telp' },
                                { 'data': 'status', render : function(data , type, row, meta){
                                    return type === 'display' ?
                                    '<span class="badge rounded-pill '+(data === 'Diterima' ? 'bg-success' : data === 'Pending' ? 'bg-secondary' : 'bg-danger')+' p-2">'+data+'</span>':
                                    data;
                                } },
                                {'data' : "id" , render : function ( data, type, row, meta ) {
                                return type === 'display'  ?
                                '<div class="d-flex justify-content-center">'+
                                    '<div class="col-4">'+
                                        '<a class="btn btn-primary btn-sm" id="show-btn" href="{{url('lamaran/')}}/'+data+'">'+
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>'+
                                        '</a>'+
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
                    }
                });
            }
        });

    </script>
