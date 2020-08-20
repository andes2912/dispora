@extends('layouts.admin')
@section('title','Absensi')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Absensi
                @if (@$cekabsen->tgl != $date)
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#absense">Absen</button>
                @endif
            </h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absen as $item)
                            <tr>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->tgl}}</td>
                                <td>{{$item->jam_masuk}}</td>
                                <td>
                                    @if ($item->jam_keluar == null)
                                        @if ($dates >= $jam)
                                            <button class="btn btn-primary btn-sm disabled">Keluar</button>
                                        @else
                                            <a class="btn btn-primary btn-sm text-white" data-id-keluar="{{$item->id}}" id="keluar">Keluar</a>
                                        @endif
                                    @else
                                        {{$item->jam_keluar}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="absense" tabindex="-1" role="dialog" aria-labelledby="absense">
    <div class="modal-dialog" role="document">
       <form action="{{route('absensi.store')}}" method="post">
           @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="absense">Input Absensi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="new-password" class="control-label">Status Kehadiran :</label>
                            <select name="status" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Hadir">hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
       </form>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    // Input Jam Keluar
    $(document).on('click','#keluar', function () {
        var id = $(this).attr('data-id-keluar');
        $.get(' {{Url("absensi-keluar")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
            location.reload();
        });
    });
</script>
@endsection