@extends('layouts.admin')
@section('title','Data Kadis')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Kadis 
                @if ($cek_kadis == NULL)
                    <a href="{{url('create-kadis')}}" class="btn btn-primary btn-sm">Tambah</a>
                @endif
            </h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Agama</th>
                            <th>Kelamin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kadis as $item)
                            <tr>
                                <td><a href="{{route('pegawai.show', $item->user_id)}}">{{$item->nip}}</a></td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->agama}}</td>
                                <td>{{$item->kelamin}}</td>
                                <td>
                                    @php
                                        $pangkat = App\pangkat::where('user_id', $item->user_id)->first();
                                    @endphp
                                    @if ($pangkat == NULL)
                                        <a href="{{url('pangkat')}}" class="btn btn-info btn-sm">Isi Pangkat</a>
                                    @endif
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