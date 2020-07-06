@extends('layouts.admin')
@section('title','Input Data Pensiun')
@section('content')
   <div class="col-12">
       <div class="card">
        <div class="card-header">
            <h4 class="m-b-0 text-black">Input Data Pensiun Pegawai</h4>
        </div>
           <div class="card-body">
                <form action="{{route('pensiun.store')}}" method="post">
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
                            <div class="col-lg-4" hidden>
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <span id="select-id-pensiun"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <span id="select-nama-pensiun"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">TGL Pensiun</label>
                                    <input type="date" name="date_pensiun" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Golongan</label>
                                    <span id="select-golongan-pensiun"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kelas</label>
                                    <span id="select-kelas-pensiun"></span>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kedudukan</label>
                                    <span id="select-kedudukan-pensiun"></span>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Gaji</label>
                                    <span id="select-gaji-pensiun"></span>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Tunjangan</label>
                                    <span id="select-tunjangan-pensiun"></span>
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

                // ID
                $.get('{{ Url("select-id-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-id-pensiun").html(resp);

                // Nama
                $.get('{{ Url("select-nama-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-nama-pensiun").html(resp);

                // Golongan
                $.get('{{ Url("select-golongan-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-golongan-pensiun").html(resp);

                 // Kelas
                 $.get('{{ Url("select-kelas-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-kelas-pensiun").html(resp);

                // Kedudukan
                 $.get('{{ Url("select-kedudukan-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-kedudukan-pensiun").html(resp);

                 // Gaji
                 $.get('{{ Url("select-gaji-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-gaji-pensiun").html(resp);
                
                 // Tunjangan
                 $.get('{{ Url("select-tunjangan-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-tunjangan-pensiun").html(resp);
                
                });
                });
                });
                });
                });
                });
                });
        }); 

        // ID
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-id-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-id-pensiun").html(resp);
            });
        });

        // Nama
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-nama-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-nama-pensiun").html(resp);
            });
        });

        // Golongan
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-golongan-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-golongan-pensiun").html(resp);
            });
        });

        // Kelas
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-kelas-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-kelas-pensiun").html(resp);
            });
        });

         // Kedudukan
         $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-kedudukan-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-kedudukan-pensiun").html(resp);
            });
        });

        // Gaji
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-gaji-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-gaji-pensiun").html(resp);
            });
        });

        // Tunjangan
        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-tunjangan-pensiun") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-tunjangan-pensiun").html(resp);
            });
        });
    </script>
@endsection