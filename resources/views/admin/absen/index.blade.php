@extends('layouts.admin')
@section('title','Absen Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Absensi Pegawai</h4>
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
                            <th>Status</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absen as $item)
                            <tr>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->tgl}}</td>
                                <td>{{$item->jam_masuk}}</td>
                                <td>{{$item->jam_keluar}}</td>
                                <td>
                                    @if ($item->status == 'Hadir')
                                        <button class="btn btn-success btn-sm disabled">{{$item->status}}</button>
                                    @elseif($item->status == 'Izin')
                                        <button class="btn btn-info btn-sm disabled" data-toggle="modal" data-target="#show_absen{{$item->id}}">{{$item->status}}</button>
                                    @elseif($item->status == 'Sakit')
                                        <button class="btn btn-warning btn-sm disabled" data-toggle="modal" data-target="#show_absen{{$item->id}}">{{$item->status}}</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->document)
                                        <a href="{{asset('document_pegawai/' .$item->document)}}" class="btn btn-secondary btn-sm">Lihat</a>
                                    @endif
                                </td>
                            </tr>

                            {{-- Modal Show --}}
                            <div class="modal fade" id="show_absen{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Data Bapak/ibu  </h5> &nbsp;&nbsp; : &nbsp; <span style="font-weight: bold">{{$item->nama}}</span>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Keterangan : {{$item->keterangan}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection