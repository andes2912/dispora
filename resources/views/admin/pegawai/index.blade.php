@extends('layouts.admin')
@section('title','Data Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Pegawai <a href="{{route('pegawai.create')}}" class="btn btn-primary btn-sm">Tambah</a></h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Kelamin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <td><a href="{{route('pegawai.show', $item->id)}}">{{$item->nip}}</a></td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->agama}}</td>
                                <td>{{$item->kelamin}}</td>
                                <td>
                                    <a href="{{route('pegawai.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{route('pegawai.destroy', $item->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
    
@endsection