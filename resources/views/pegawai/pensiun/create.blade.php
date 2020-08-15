@extends('layouts.pegawai')
@section('title','Input Data Pensiun')
@section('content')
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
                            <input type="hidden" name="id_pangkat" value="{{Auth::user()->pangkat->id}}">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{Auth::user()->name}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">TGL Pensiun</label>
                                    <input type="text" name="date_pensiun" id="date" class="form-control" required>
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

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Gaji</label>
                                    <input type="text" name="gaji" class="form-control" value="{{Auth::user()->gaji->gaji}}" readonly>

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Tunjangan</label>
                                    <input type="text" name="tunjangan" class="form-control" value="{{Auth::user()->gaji->tunjangan}}" readonly>

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
         $("#date").datepicker( {
            todayHighlight: !0, 
            orientation: "bottom left",
            startDate: new Date()
        })
    </script>
@endsection