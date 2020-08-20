@extends('layouts.admin')
@section('title','Input Data Mutasi')
@section('content')
    @if ($cek_kadis !== NULL)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-black">Input Data Mutasi Pegawai</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('mutasi-pegawai.store')}}" method="post">
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">NIP</label>
                                        <input type="text" id="nip" name="nip" value="{{auth::user()->nip}}" class="form-control border-primary" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" name="nama" value="{{auth::user()->name}}" class="form-control border-primary" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">No Surat</label>
                                        <input type="text" name="no_surat" class="form-control border-primary" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Jabatan Baru</label>
                                            <input type="text" name="jabatan_baru" class="form-control border-primary" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Mutasi</label>
                                            <input type="text" name="tgl_mutasi" class="form-control border-primary datepicker" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Masuk</label>
                                            <input type="text" name="tgl_masuk" class="form-control border-primary datepicker" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span id="select-jabatan-mutasi-pegawai" hidden></span>
                            <span id="select-id-mutasi-pegawai" hidden></span>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Alasan</label>
                                        <textarea name="perihal" rows="3" class="form-control border-primary"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info btn-sm">Submit</button>
                            <a href="{{url('mutasi-pegawai')}}" class="btn btn-warning btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="col-12 alert alert-danger alert-rounded">
            Data Kadis Tidak Tersedia !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
            </button>
        </div>
    @endif
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var nip = $("#nip").val();
               
                // Jabatan
                $.get('{{ Url("select-jabatan-mutasi-pegawai") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-jabatan-mutasi-pegawai").html(resp);

                // ID
                $.get('{{ Url("select-id-mutasi-pegawai") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-id-mutasi-pegawai").html(resp);

                });
                });
        }); 

        // Jabatan
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-jabatan-mutasi-pegawai") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-jabatan-mutasi-pegawai").html(resp);
            });
        });

        // ID
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-id-mutasi-pegawai") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-id-mutasi-pegawai").html(resp);
            });
        });

        $(".datepicker").datepicker( {
            todayHighlight: !0, 
            orientation: "bottom left",
            startDate: new Date()
        })
    </script>
@endsection