@extends('adminlte::page')

@section('title', 'List User')

@section('content_header')
    <h1 class="m-0 text-dark">List Promo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('promo.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Promo</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Diskon</th>
                            <th>Minimal Belanja</th>
                            <th>Nama Paket</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promo as $key => $promos)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$promos->kode_promo}}</td>
                                <td>{{$promos->startdate}}</td>
                                @if(date("Y-m-d") >= $promos->end_date)  
                                <td class="text-danger"><b>Berakhir</b></td>
                                @else
                                <td>{{$promos->end_date}}</td>
                                @endif
                                <td>{{$promos->diskon}}</td>
                                <td>{{$promos->min_belanja}}</td>
                                <td>{{$promos->nama_paket}}</td>
                                <td>
                                    <a href="{{route('promo.edit', $promos->id)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('promo.destroy', $promos->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
