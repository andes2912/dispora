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

            <div class="row">
                <div class="col-md-3">
                    <label>Filter Jabatan:</label>
                    <select name="jabatan" id="jabatan" class="form-control">
                        <option value="">Select</option>
                        @php
                            $jabatan = App\pangkat::select('jabatan')->groupBy('jabatan')->get();
                        @endphp
                        @foreach ($jabatan as $item)
                            <option value="{{$item->jabatan}}">{{$item->jabatan}}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Filter Golongan:</label>
                    <select name="golongan" id="golongan" class="form-control">
                        <option value="">Select</option>
                        @php
                            $golongan = App\pangkat::select('golongan')->groupBy('golongan')->get();
                        @endphp
                        @foreach ($golongan as $item)
                            <option value="{{$item->golongan}}">Golongan {{$item->golongan}}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Filter Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select</option>
                        <option value="Pensiun">Pensiun</option>
                        <option value="Aktif">Aktif</option>
                    </select>
                </div>
               <div class="col-md-2">
                    <label>.</label>
                    <div>
                        <button class="btn btn-success" id="filter">Filter</button>
                        <button class="btn btn-info" id="cetak">Cetak</button>
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
                        @foreach ($pegawai as $item)
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
            var jabatan = $("#jabatan").val();
            var golongan = $("#golongan").val();
            var status = $("#status").val();
            $.get('{{ Url("laporan-pegawai-kadis-f") }}',{'_token': $('meta[name=csrf-token]').attr('content'),jabatan:jabatan,golongan:golongan,status:status}, function(resp){  
            $("#refresh_tbody").html(resp);
            });
        });

        // Download
        $(document).on('click', '#cetak', function(e){
        e.preventDefault();
        if(e.which===1){
            var jabatan = $("#jabatan").val();
            var golongan = $("#golongan").val();
        $.ajax({
                cache: false,
                type: 'GET',
                url: 'laporan-pegawai-kadis-down',
                contentType: false,
                processData: false,
                data: 'jabatan=' + jabatan + '&golongan=' + golongan,
                //xhrFields is what did the trick to read the blob to pdf
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (response, status, xhr) {
                    var filename = "";                   
                    var disposition = xhr.getResponseHeader('Content-Disposition');
                    if (disposition) {
                        var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                        var matches = filenameRegex.exec(disposition);
                        if (matches !== null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                    } 
                    var linkelem = document.createElement('a');
                    try {
                        var blob = new Blob([response], { type: 'application/octet-stream' });                        
                        if (typeof window.navigator.msSaveBlob !== 'undefined') {
                            //   IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                            window.navigator.msSaveBlob(blob, filename);
                        } else {
                            var URL = window.URL || window.webkitURL;
                            var downloadUrl = URL.createObjectURL(blob);
                            if (filename) { 
                                // use HTML5 a[download] attribute to specify filename
                                var a = document.createElement("a");
                                // safari doesn't support this yet
                                if (typeof a.download === 'undefined') {
                                    window.location = downloadUrl;
                                } else {
                                    a.href = downloadUrl;
                                    a.download = filename;
                                    document.body.appendChild(a);
                                    a.target = "_blank";
                                    a.click();
                                }
                            } else {
                                window.location = downloadUrl;
                            }
                        }   
                    } catch (ex) {
                        console.log(ex);
                    } 
                }
                });
            }
        });
    </script>
@endsection
