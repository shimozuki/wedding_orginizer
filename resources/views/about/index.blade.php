@extends('adminlte::page')

@section('title', 'List User')

@section('content_header')
    <h1 class="m-0 text-dark">List Tentang Website</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>WhatsApp</th>
                            <th>Email</th>
                            <th>Tiktok</th>
                            <th>Nama Website</th>
                            <th>Tentang</th>
                            <th>gambar</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($about as $key => $aboutes)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$aboutes->facebook}}</td>
                                <td>{{$aboutes->instagram}}</td>
                                <td>{{$aboutes->whatsapp}}</td>
                                <td>{{$aboutes->email}}</td>
                                <td>{{$aboutes->tiktok}}</td>
                                <td>{{$aboutes->website}}</td>
                                <td>{{Str::substr($aboutes->about, 0,60, $end='.......')}}</td>
                                <td><img src="assets/image/{{$aboutes->image}}"  width="100px"></td>
                                <td>
                                    <a href="{{route('abouts.edit', $aboutes)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('abouts.destroy', $aboutes)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
