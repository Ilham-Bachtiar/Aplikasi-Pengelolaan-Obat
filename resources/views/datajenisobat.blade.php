@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-2">Data Jenis Obat</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>
    <div class="container">

        <a href="/tambahjenisobat/" class="btn btn-primary" type="button">Tambah</a>

        <div class="row">

            <div class="row g-3 align-items-center  mt-2">

                
               
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Jenis Obat</th>
                            <th scope="col" width="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                        @endphp

                        @foreach ($data as $index => $row)

                    

                        <tr>
                            <td width="50px">{{ $index + $data->firstItem() }}</td>
                            <td width="400px">{{ $row->nama_jenis_obat }}</td>
                            


                        
                            <td width="400px">
                                <a href="/tampiljenisobat/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->nama_jenis_obat }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</div>
</body>
<script>
    $('.delete').click(function() {
        var jenisobatid = $(this).attr('data-id');
        var jenisobat = $(this).attr('data-name');
        swal({
                title: "Yakin?",
                text: "Data dengan nama " + jenisobat +" " + "yakin akan dihapus!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletejenisobat/" + jenisobatid + ""
                    swal("Data sudah dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    })
</script>

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>

@endsection