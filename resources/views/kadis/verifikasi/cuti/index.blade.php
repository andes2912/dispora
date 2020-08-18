@extends('layouts.kadis')
@section('title','Verifikasi Data Cuti')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
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
                            <th>Action</th>
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
                                    @if ($item->status_approve == 'Proses')
                                        <button type="submit" id="approve_cuti" data-id-approve-cuti="{{$item->id}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button id="reject_cuti" data-id-reject-cuti="{{$item->id}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    @endif
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
@section('scripts')
    <script type="text/javascript">
        // Approve Cuti 
        $(document).on('click','#approve_cuti', function () {
        var id = $(this).attr('data-id-approve-cuti');
            $.get(' {{Url("cuti-approve")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
                localStorage.setItem("swal", JSON.stringify({
                        title: "Data Berhasil Di Update!",
                        text: 'Thanks',
                        icon: "success",
                        button: true
                    }));

                    swal(JSON.parse(localStorage.getItem("swal"))).then(() => location.reload());
            });
        });

        // Reject Cuti
        $(document).on('click','#reject_cuti', function () {
        var id = $(this).attr('data-id-reject-cuti');
            $.get(' {{Url("cuti-reject")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
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