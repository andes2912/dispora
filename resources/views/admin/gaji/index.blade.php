@extends('layouts.admin')
@section('title','Gaji Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Gaji Pegawai
                <a href="{{route('gaji.create')}}" class="btn btn-info btn-sm">Tambah</a>
            </h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Tunjangan</th>
                            <th>Golongan</th>
                            <th>Kelas</th>
                            <th>Kedudukan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($gaji as $item)
                           <td>{{$item->nip}}</td>
                           <td>{{$item->nama}}</td>
                           <td>{{$item->gaji}}</td>
                           <td>{{$item->tunjangan}}</td>
                           <td>{{$item->golongan}}</td>
                           <td>{{$item->kelas}}</td>
                           <td>{{$item->kedudukan}}</td>
                            <td>
                                <a href="{{route('gaji.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection