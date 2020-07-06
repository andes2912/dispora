@extends('layouts.admin')
@section('title','Pensiun Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Pensiun Pegawai
                <a href="{{route('pensiun.create')}}" class="btn btn-info btn-sm">Tambah</a>
            </h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>TGL Pensiun</th>
                            <th>Golongan</th>
                            <th>Gaji</th>
                            <th>Tunjangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pensiun as $item)
                            <tr>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->jabatan}}</td>
                                <td>{{$item->golongan}}</td>
                                <td>{{$item->kelas}}</td>
                                <td>{{$item->kedudukan}}</td>
                                <td>
                                    <a href="{{route('pangkat.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
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