@extends('layouts.admin')
@section('title','Input Data Cuti')
@section('content')
   <div class="col-12">
       <div class="card">
        <div class="card-header">
            <h4 class="m-b-0 text-black">Input Data Cuti Pegawai</h4>
        </div>
           <div class="card-body">
                <form action="{{route('cuti-pegawai.store')}}" method="post">
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">NIP</label>
                                    <input type="text" name="nip" value="{{$pegawai->nip}}" class="form-control border-primary" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" value="{{auth::user()->name}}" class="form-control border-primary" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <input type="text" value="Proses" class="form-control border-primary" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Cuti</label>
                                        <input type="date" name="add_date[0][date_leave]" class="form-control border-primary" required>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-gorup">
                                        <label class="control-label">.</label>
                                        <input id="add_date" class="btn btn-info btn-sm form-control text-white " value="+">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Alasan</label>
                                    <textarea name="reason" rows="3" class="form-control border-primary" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Mengetahui</label>
                                    <select name="id_approval" id="id" class="form-control" required>
                                        <option value="">Select</option>
                                        @foreach ($approval as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6" hidden>
                                <label class="control-label">Nama Approval</label>
                                <span id="select-nama-approval"></span>
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
        // Add Date Cuti
        var a = 0;
        $(document).on('click','#add_date', function (){
            ++a;

            $(".form").append('<div class="removes row"><div class="col-lg-4"><div class="form-group"><label class="control-label">Tanggal Cuti</label><input type="date" name="add_date['+a+'][date_leave]" class="form-control border-primary"></div></div><div class="col-lg-1"><div class="form-gorup"><label class="control-label">.</label><input class="btn btn-warning btn-sm form-control text-white remove-date" value="-"></div></div></div>');
        });

        $(document).on('click', '.remove-date', function () {
            $(this).parents('.removes').remove(); 
        });

        // Nama Aproval Cuti
        $(document).ready(function() {
            var id = $("#id").val();
                $.get('{{ Url("nama-approval-cuti") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                    $("#select-nama-approval").html(resp);
                });
        }); 

        $(document).on('change', '#id', function (e) { 
            var id = $(this).val();
            $.get('{{ Url("nama-approval-cuti") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select-nama-approval").html(resp);
            });
        });
    </script>
@endsection