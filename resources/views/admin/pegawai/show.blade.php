@extends('layouts.admin')
@section('title','Detail Data Pegawai')
@section('content')
@php
    $profileNull = $show->pegawai->ttl == null || $show->pegawai->tempatlahir == null || $show->pegawai->kelamin == null || $show->pegawai->agama == null || $show->pegawai->nonpwp == null || $show->pegawai->nik == null || $show->pegawai->alamat == null || $show->pegawai->foto == null;
@endphp
@if ($profileNull)
    <div class="col-12 alert alert-danger alert-rounded">
        @if ($show->pegawai->foto == null)
            <img src="../assets/images/users/1.jpg" width="30" height="30" class="img-circle" alt="img">
        @else
            <img src="/foto_pegawai/{{$show->pegawai->foto}}" width="30" height="30" class="img-circle" alt="img">
        @endif
        Data Pegawai Belum Lengkap!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
        </button>
    </div>
@elseif($show->status == 'Pensiun')
    <div class="col-12 alert alert-danger alert-rounded">
        @if ($show->pegawai->foto == null)
            <img src="../assets/images/users/1.jpg" width="30" height="30" class="img-circle" alt="img">
        @else
            <img src="/foto_pegawai/{{$show->pegawai->foto}}" width="30" height="30" class="img-circle" alt="img">
        @endif
        Akun Ini Sudah Pensiun!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
        </button>
    </div>
@endif
<div class="container-fluid">
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="/foto_pegawai/{{$show->pegawai->foto ?: '../assets/images/users/5.jpg'}}" class="img-circle" width="150" height="150" />
                    <h4 class="card-title m-t-10">{{$show->name}}</h4>
                    <h6 class="card-subtitle">{{$show->pangkat->jabatan ?? 'Jabatan Belum Diisi !'}}</h6>
                    <h6 class="card-subtitle">NIK : {{$show->pegawai->nik ?: 'Belum Diisi'}}</h6>
                </center>
                <small class="text-muted p-t-30 db">Social Profile</small>
                <br/>
                <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">{{$show->name ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>NIP</strong>
                                <br>
                                <p class="text-muted">{{$show->nip ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{$show->email ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->alamat ?: 'Belum Diisi'}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>TTL</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->ttl ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Kelamin</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->kelamin ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Agama</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->agama ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Alamat</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->alamat ?: 'Belum Diisi'}}</p>
                            </div>
                            <hr>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Gol Darah</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->goldarah ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>No. Askes</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->noaskes ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>No. Taspen</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->notaspen ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>No. NPWP</strong>
                                <br>
                                <p class="text-muted">{{$show->pegawai->nonpwp ?: 'Belum Diisi'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
</div>
@endsection