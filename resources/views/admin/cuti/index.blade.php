@extends('layouts.admin')
@section('title','Cuti Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Cuti Pegawai</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuti as $item)
                            <tr>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <?php
                                        $cutis = App\cuti_taken::where('id_cuti',$item->id)->count();
                                    ?>
                                    {{$cutis}} Hari
                                </td>
                                <td>{{$item->status_approval}}</td>
                                <td>
                                    <a href="{{route('cuti.show', $item->id)}}" class="btn btn-warning btn-sm">Lihat</a>
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