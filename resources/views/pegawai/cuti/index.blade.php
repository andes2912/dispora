@extends('layouts.admin')
@section('title','Data Cuti')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Cuti 
                <a href="{{route('cuti-pegawai.create')}}" class="btn btn-info btn-sm">Ajukan Cuti</a>
            </h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Tgl Pengajuan</th>
                            <th>Status</th>
                            <th>Alasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach ($cuti as $item)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <?php
                                        $cutis = App\cuti_taken::where('id_cuti',$item->id)->count();
                                    ?>
                                    {{$cutis}} Hari
                                </td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->status_approval}}</td>
                                <td>
                                    {{$item->reason_approval}}
                                </td>
                            </tr>
                        <?php
                            $no++
                        ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
