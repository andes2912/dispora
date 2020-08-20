@extends('layouts.admin')
@section('title','Data Pensiun')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pensiun 
                <a href="{{route('pensiun-pegawai.create')}}" class="btn btn-info btn-sm">Ajukan Pensiun</a>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pensiun as $item)
                            <tr>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->date_pensiun}}</td>
                                <td>{{$item->golongan}}</td>
                                <td>
                                    <a href="{{url('akun', Auth::user()->pegawai->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
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
