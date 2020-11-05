@extends('layouts.admin')
@section('title','Mutasi Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Mutasi Pegawai
                <a href="{{route('mutasi.create')}}" class="btn btn-info btn-sm">Tambah</a>
            </h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>No. Surat</th>
                            <th>TGL Mutasi</th>
                            <th>Jabatan Lama</th>
                            <th>Jabatan Baru</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        @foreach ($mutasi as $item)
                            <tr>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->no_surat}}</td>
                                <td>{{$item->tgl_mutasi}}</td>
                                <td>{{$item->jabatan_lama}}</td>
                                <td>{{$item->jabatan_baru}}</td>
                                <td>
                                    @if ($item->document)
                                        <a href="{{asset('document_pegawai/'. $item->document)}}" class="btn btn-info btn-sm">File</a>
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