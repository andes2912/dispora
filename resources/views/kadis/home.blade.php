@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
@if (Auth::user()->pegawai->ttl == null || Auth::user()->pegawai->tempatlahir == null || Auth::user()->pegawai->kelamin == null || Auth::user()->pegawai->agama == null || Auth::user()->pegawai->nonpwp == null || Auth::user()->pegawai->nik == null || Auth::user()->pegawai->alamat == null || Auth::user()->pegawai->foto == null)
<div class="col-12 alert alert-danger alert-rounded">
    @if (Auth::user()->pegawai->foto == null)
        <img src="../assets/images/users/1.jpg" width="30" class="img-circle" alt="img">
    @else
        <img src="/foto_pegawai/{{Auth::user()->pegawai->foto}}" width="30" class="img-circle" alt="img">
    @endif
    Mohon Lengkapi Data Untuk Dapat Mengakses Fitur!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
    </button>
</div>
@elseif(Auth::user()->status == 'Pensiun')
<div class="col-12 alert alert-danger alert-rounded">
    @if (Auth::user()->pegawai->foto == null)
        <img src="../assets/images/users/1.jpg" width="30" height="30" class="img-circle" alt="img">
    @else
        <img src="/foto_pegawai/{{Auth::user()->pegawai->foto}}" width="30" height="30" class="img-circle" alt="img">
    @endif
    Akun Ini Sudah Pensiun!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
    </button>
</div>
@endif
<!-- Column -->
<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <!-- Row -->
            <div class="row">
                <div class="col-8"><h2>{{$total}} <i class="fa fa-users text-danger"></i></h2>
                    <h6> Total Pegawai</h6></div>
                <div class="col-4 align-self-center text-right  p-l-0">
                    <div id="sparklinedash3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <!-- Row -->
            <div class="row">
                <div class="col-8"><h2 class="">{{$laki}} <i class="fa fa-user text-success"></i></h2>
                    <h6>Laki-laki</h6></div>
                <div class="col-4 align-self-center text-right p-l-0">
                    <div id="sparklinedash"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <!-- Row -->
            <div class="row">
                <div class="col-8"><h2>{{$ladies}} <i class="fa fa-user text-info"></i></h2>
                    <h6>Perempuan</h6></div>
                <div class="col-4 align-self-center text-right p-l-0">
                    <div id="sparklinedash2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Column -->
<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <!-- Row -->
            <div class="row">
                <div class="col-8"><h2>{{$aktif}} <i class="fa fa-user-circle text-primary"></i></h2>
                    <h6>Aktif</h6></div>
                <div class="col-4 align-self-center text-right p-l-0">
                    <div id="sparklinedash4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection