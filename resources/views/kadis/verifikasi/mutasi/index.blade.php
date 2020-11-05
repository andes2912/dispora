@extends('layouts.admin')
@section('title','Data Mutasi')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Mutasi</h4>
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
                            <th>Action</th>
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
                                    @elseif($item->status == 2)
                                        Reject
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 0)
                                        <button id="approve_mutasi" data-id-approve-mutasi="{{$item->id}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button id="reject_mutasi" data-id-reject-mutasi="{{$item->id}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        @if ($item->document)
                                            <a href="{{asset('document_pegawai/' . $item->document)}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-file"></i>
                                            </a>
                                        @endif
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
@section('scripts')
    <script type="text/javascript">
        // Approve Mutasi 
        $(document).on('click','#approve_mutasi', function () {
        var id = $(this).attr('data-id-approve-mutasi');
            $.get(' {{Url("mutasi-approve")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
                localStorage.setItem("swal", JSON.stringify({
                        title: "Data Berhasil Di Update!",
                        text: 'Thanks',
                        icon: "success",
                        button: true
                    }));

                    swal(JSON.parse(localStorage.getItem("swal"))).then(() => location.reload());
            });
        });

        // Reject Mutasi 
        $(document).on('click','#reject_mutasi', function () {
        var id = $(this).attr('data-id-reject-mutasi');
            $.get(' {{Url("mutasi-reject")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
                localStorage.setItem("swal", JSON.stringify({
                        title: "Data Berhasil Di Update!",
                        text: 'Thanks',
                        icon: "success",
                        button: true
                    }));

                    swal(JSON.parse(localStorage.getItem("swal"))).then(() => location.reload());
            });
        });
    </script>
@endsection