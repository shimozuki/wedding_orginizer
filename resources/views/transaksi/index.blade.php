@extends('adminlte::page')

@section('title', 'List User')

@section('content_header')
    <h1 class="m-0 text-dark">List Transaksi</h1>
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Tlpn</th>
                            <th>Tanggal Acara</th>
                            <th>Paket Pesanan</th>
                            <th>Total harga</th>
                            <th>Status Layanan</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaksi as $key => $transaksis)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$transaksis->nama}}</td>
                                <td>{{$transaksis->alamat}}</td>
                                <td>{{$transaksis->no_tlpn }}</td>
                                <td>{{$transaksis->tanggal_layanan}}</td>
                                <td>{{$transaksis->nama_paket}}</td>
                                <td>{{$transaksis->total_harga}}</td>
                                <td><p class="text-{{$transaksis->warna}}"><b>{{$transaksis->keterangan}}</b></p></td>
                                <td>
                                    <a href="{{url('status/'.$transaksis->id)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
