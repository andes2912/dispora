@extends('layouts.admin')
@section('title','Input Data Pensiun')
@section('content')
   @if (Auth::user()->pangkat !== NULL)
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="m-b-0 text-black">Input Data Pensiun Pegawai</h4>
            </div>
            <div class="card-body">
                <form action="{{route('pensiun-pegawai.store')}}" method="post">
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">NIP</label>
                                    <input type="text" name="nip" class="form-control" value="{{Auth::user()->nip}}" readonly>
                                </div>
                            </div>
                            <input type="hidden" name="pangkat_id" value="{{Auth::user()->pangkat->id}}">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{Auth::user()->name}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">TGL Pensiun</label>
                                    <input type="text" name="date_pensiun" id="date" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Golongan</label>
                                    <input type="text" name="golongan" class="form-control" value="{{Auth::user()->pangkat->golongan}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kelas</label>
                                    <input type="text" name="kelas" class="form-control" value="{{Auth::user()->pangkat->kelas}}" readonly>

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Kedudukan</label>
                                    <input type="text" name="kedudukan" class="form-control" value="{{Auth::user()->pangkat->kedudukan}}" readonly>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-info btn-sm">Submit</button>
                        <a href="{{url('pensiun-pegawai')}}" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
   @else
    <div class="col-12 alert alert-danger alert-rounded">
            @if (Auth::user()->pegawai->foto == null)
                <img src="../assets/images/users/1.jpg" width="30" height="30" class="img-circle" alt="img">
            @else
                <img src="/foto_pegawai/{{Auth::user()->pegawai->foto}}" width="30" height="30" class="img-circle" alt="img">
            @endif
            Data Pangkat Belum Diisi !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
            </button>
        </div>
   @endif
@endsection
@section('scripts')
    <script type="text/javascript">
         $("#date").datepicker( {
            todayHighlight: !0, 
            orientation: "bottom left",
            startDate: new Date()
        })
    </script>
@endsection