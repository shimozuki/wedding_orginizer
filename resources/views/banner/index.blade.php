@extends('adminlte::page')

@section('title', 'List User')

@section('content_header')
    <h1 class="m-0 text-dark">List Paket</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('banners.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banner as $key => $banners)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$banners->judul}}</td>
                                <td>{{$banners->deskripsi}}</td>
                                <td><img src="assets/image/{{$banners->gambar}}"  width="100px"></td>
                                <td>
                                    <a href="{{route('banners.edit', $banners)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('banners.destroy', $banners)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
