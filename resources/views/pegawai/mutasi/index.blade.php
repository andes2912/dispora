@extends('layouts.admin')
@section('title','Data Mutasi')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Mutasi 
                @if (@$cek_mutasi->status !== 0)
                    <a href="{{route('mutasi-pegawai.create')}}" class="btn btn-info btn-sm">Ajukan Mutasi</a>  
                @endif
            </h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            {{-- <th>NIP</th> --}}
                            <th>Nama</th>
                            <th>No. Surat</th>
                            <th>Tgl Pengajuan</th>
                            <th>Jabatan Baru</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($mutasi as $item)    
                            <tr>
                                <td>{{$no}}</td>
                                {{-- <td>{{$item->nip}}</td> --}}
                                <td>{{$item->nama}}</td>
                                <td>{{$item->no_surat}}</td>
                                <td>{{Carbon\carbon::parse($item->tgl_mutasi)->format('d-m-Y')}}</td>
                                <td>{{$item->jabatan_baru}}</td>
                                <td>
                                    @if ($item->status == 1)
                                        Disetujui
                                    @elseif($item->status == 0)
                                        Proses
                                    @endif
                                </td>
                            </tr>
                        @php
                            $no++;
                        @endphp
                        @endforeach
                    </tbody>
                  
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
