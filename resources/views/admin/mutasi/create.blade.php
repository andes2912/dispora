@extends('layouts.admin')
@section('title','Input Data Mutasi')
@section('content')
   <div class="col-12">
       <div class="card">
        <div class="card-header">
            <h4 class="m-b-0 text-black">Input Data Mutasi Pegawai</h4>
        </div>
           <div class="card-body">
                <form action="{{route('mutasi.store')}}" method="post">
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">NIP</label>
                                    <select id="nip" name="nip" class="select2 form-control" required>
                                        <option value="">Select NIP</option>
                                        @foreach ($pegawai as $item)
                                            <option value="{{$item->nip}}">{{$item->nip}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <span id="select-nama-mutasi"></span>
                                </div>
                            </div>
                            <div class="col-lg-4" hidden>
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <span id="select-id-mutasi"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">No. Surat</label>
                                    <input type="text" name="no_surat" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Perihal</label>
                                    <textarea name="perihal" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Jabatan Sekarang</label>
                                    <span id="select-jabatan-mutasi"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Jabatan Baru</label>
                                    <input type="text" name="jabatan_baru" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">TGL Mutasi</label>
                                    <input type="date" name="tgl_mutasi" class="form-control" required autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">TGL Masuk</label>
                                    <input type="date" name="tgl_masuk" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <a href="{{url('mutasi')}}" class="btn btn-inverse">Cancel</a>
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
                // NIP 
                $.get('{{ Url("select-nama-mutasi") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-nama-mutasi").html(resp);
                
                // Jabatan
                $.get('{{ Url("select-jabatan-mutasi") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-jabatan-mutasi").html(resp);

                // ID
                $.get('{{ Url("select-jabatan-mutasi") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-jabatan-mutasi").html(resp);

                });
                });
                });
        }); 

        // NIP 
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-nama-mutasi") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-nama-mutasi").html(resp);
            });
        });

        // Jabatan
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-jabatan-mutasi") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-jabatan-mutasi").html(resp);
            });
        });

        // ID
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-id-mutasi") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-id-mutasi").html(resp);
            });
        });
    </script>
@endsection