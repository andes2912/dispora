@extends('layouts.admin')
@section('title','Data Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Data Absensi Pegawai
            </h4>

            <div class="row">
                <div class="col-md-3">
                    <label>Filter Absensi:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                    </select>
                </div>
               <div class="col-md-2">
                    <label>.</label>
                    <div>
                        <button class="btn btn-success" id="filter">Filter</button>
                    </div>
               </div>
            </div>
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
                            {{-- <td>Cetak</td> --}}
                        </tr>
                    </thead>
                    <tbody id="refresh_tbody">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($absensi as $item)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->pegawai->kelamin}}</td>
                                <td>{{$item->pangkat->jabatan ?? '' }}</td>
                                <td>{{$item->pegawai->agama}}</td>
                                {{-- <td>
                                    <i class="fa fa-print"></i>
                                </td> --}}
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
        // filter 
        $(document).on('click', '#filter', function (e) { 
            var status = $("#status").val();
            $.get('{{ Url("filter-laporan-absensi") }}',{'_token': $('meta[name=csrf-token]').attr('content'),status:status}, function(resp){  
            $("#refresh_tbody").html(resp);
            });
        });
    </script>
@endsection
