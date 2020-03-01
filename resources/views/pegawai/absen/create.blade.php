@extends('layouts.pegawai')
@section('title','Input Absen')
@section('content')
   <div class="col-4">
       <div class="card">
        <div class="card-header">
            <h4 class="m-b-0 text-black">Input Absensi Pegawai</h4>
        </div>
           <div class="card-body">
                <form action="{{route('absensi.store')}}" method="post">
                @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Status Kehadiran</label>
                            <select name="status" class="form-control" required>
                                <option value="">Kehadiran</option>
                                <option value="Hadir">hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3"></textarea>
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