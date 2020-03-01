@extends('layouts.pegawai')
@section('title','Absensi')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Absensi
                @if (@$cekabsen->tgl != $date)
                    <a href="{{route('absensi.create')}}" class="btn btn-info btn-sm">Absen</a>
                @endif
            </h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absen as $item)
                            <tr>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->tgl}}</td>
                                <td>{{$item->jam_masuk}}</td>
                                <td>
                                    @if ($item->jam_keluar == null)
                                        @if ($dates >= $jam)
                                            <button class="btn btn-primary btn-sm disabled">Keluar</button>
                                        @else
                                            <a class="btn btn-primary btn-sm text-white" data-id-keluar="{{$item->id}}" id="keluar">Keluar</a>
                                        @endif
                                    @else
                                        {{$item->jam_keluar}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    // Input Jam Keluar
    $(document).on('click','#keluar', function () {
        var id = $(this).attr('data-id-keluar');
        $.get(' {{Url("absensi-keluar")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
            location.reload();
        });
    });
</script>
@endsection