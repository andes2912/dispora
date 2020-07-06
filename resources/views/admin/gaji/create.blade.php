@extends('layouts.admin')
@section('title','Input Data Gaji')
@section('content')
   <div class="col-12">
       <div class="card">
        <div class="card-header">
            <h4 class="m-b-0 text-black">Input Data Gaji Pegawai</h4>
        </div>
           <div class="card-body">
                <form action="{{route('gaji.store')}}" method="post">
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
                                    <span id="select-nama-gaji"></span>
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
                                    <input type="text" name="gaji" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Tunjangan</label>
                                    <input type="text" name="tunjangan" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Golongan</label>
                                    <select name="golongan" id="" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="A">Golongan A</option>
                                        <option value="B">Golongan B</option>
                                        <option value="C">Golongan A/option>
                                        <option value="D">Golongan D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kelas</label>
                                    <select name="kelas" id="" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="A">Golongan A</option>
                                        <option value="B">Golongan B</option>
                                        <option value="C">Golongan A/option>
                                        <option value="D">Golongan D</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kedudukan</label>
                                    <input type="text" name="kedudukan" class="form-control" required>
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