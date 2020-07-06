@extends('layouts.admin')
@section('title','Edit Data Gaji')
@section('content')
   <div class="col-12">
       <div class="card">
        <div class="card-header">
            <h4 class="m-b-0 text-black">Edit Data Gaji Pegawai</h4>
        </div>
           <div class="card-body">
                <form action="{{route('gaji.update', $gaji->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">NIP</label>
                                    <input type="text" name="nip" value="{{$gaji->nip}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" name="nama" value="{{$gaji->nama}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4" hidden>
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <span id="select-id-gaji"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Jumlah Gaji</label>
                                    <input type="text" name="gaji" value="{{$gaji->gaji}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Tunjangan</label>
                                    <input type="text" name="tunjangan" value="{{$gaji->tunjangan}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Golongan</label>
                                    <select name="golongan" id="" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="A"@if($gaji->golongan=='A') selected='selected' @endif >A</option>
                                        <option value="B"@if($gaji->golongan=='B') selected='selected' @endif >B</option>
                                        <option value="C"@if($gaji->golongan=='C') selected='selected' @endif >D</option>
                                        <option value="D"@if($gaji->golongan=='D') selected='selected' @endif >D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kelas</label>
                                    <select name="kelas" id="" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="A"@if($gaji->kelas=='A') selected='selected' @endif >A</option>
                                        <option value="B"@if($gaji->kelas=='B') selected='selected' @endif >B</option>
                                        <option value="C"@if($gaji->kelas=='C') selected='selected' @endif >C</option>
                                        <option value="D"@if($gaji->kelas=='D') selected='selected' @endif >D</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kedudukan</label>
                                    <input type="text" name="kedudukan" value="{{$gaji->kedudukan}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var nip = $("#nip").val();
                // Nama Pegawai 
                $.get('{{ Url("select-nama-gaji") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-nama-gaji").html(resp);
                // ID User 
                $.get('{{ Url("select-id-gaji") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-id-gaji").html(resp);
                });
                });
        }); 

        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-nama-gaji") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-nama-gaji").html(resp);
            });
        });

        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-id-gaji") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-id-gaji").html(resp);
            });
        });
    </script>
@endsection