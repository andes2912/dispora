@extends('layouts.admin')
@section('title','Data Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Data Pegawai
                <a href="{{url('get-pdf')}}" class="btn btn-primary btn-sm"> <i class="fa fa-file-pdf-o"></i> PDF</a>
                <a href="{{url('get-excel')}}" class="btn btn-success btn-sm"> <i class="fa fa-file-excel-o"></i> EXCEL</a>
            </h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Jabatan</th>
                            <th>Agama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pegawai as $item)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->pegawai->kelamin}}</td>
                                <td>{{$item->pangkat->jabatan ?? '' }}</td>
                                <td>{{$item->pegawai->agama}}</td>
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
