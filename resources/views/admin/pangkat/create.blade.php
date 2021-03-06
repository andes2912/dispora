@extends('layouts.admin')
@section('title','Input Data Pangkat')
@section('content')
   <div class="col-12">
       <div class="card">
        <div class="card-header">
            <h4 class="m-b-0 text-black">Input Data Pangkat Pegawai</h4>
        </div>
           <div class="card-body">
                <form action="{{route('pangkat.store')}}" method="post">
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
                            <span id="select-id-pegawai" hidden></span>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <span id="select-nama-pangkat"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Golongan</label>
                                    <select name="golongan" id="" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="A">Golongan A</option>
                                        <option value="B">Golongan B</option>
                                        <option value="C">Golongan C</option>
                                        <option value="D">Golongan D</option>
                                        <option value="E">Golongan E</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kelas</label>
                                    <select name="kelas" id="" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="I">Juru</option>
                                        <option value="II">Pengatur</option>
                                        <option value="III">Penata</option>
                                        <option value="IV">Pembina</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kedudukan</label>
                                    <input type="text" name="kedudukan" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{url('pangkat')}}" class="btn btn-inverse">Cancel</a>
                    </div>
                </form>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        // NAMA PEGAWAI 
        $(document).ready(function() {
            var nip = $("#nip").val();
                $.get('{{ Url("select-nama-pangkat") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-nama-pangkat").html(resp);
                });
        }); 

        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-nama-pangkat") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-nama-pangkat").html(resp);
            });
        });

        // ID PEGAWAI
        $(document).ready(function() {
            var nip = $("#nip").val();
                $.get('{{ Url("select-id-pegawai") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                    $("#select-id-pegawai").html(resp);
                });
        }); 

        $(document).on('change', '#nip', function (e) { 
            var nip = $(this).val();
            $.get('{{ Url("select-id-pegawai") }}',{'_token': $('meta[name=csrf-token]').attr('content'),nip:nip}, function(resp){  
                $("#select-id-pegawai").html(resp);
            });
        });
    </script>
@endsection