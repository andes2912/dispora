@extends('layouts.admin')
@section('title','Detail Data Pegawai')
@section('content')
@php
    $profileNull = Auth::user()->pegawai->ttl == null || Auth::user()->pegawai->tempatlahir == null || Auth::user()->pegawai->kelamin == null || Auth::user()->pegawai->agama == null || Auth::user()->pegawai->nonpwp == null || Auth::user()->pegawai->nik == null || Auth::user()->pegawai->alamat == null || Auth::user()->pegawai->foto == null;
@endphp
@if ($profileNull)
    <div class="col-12 alert alert-danger alert-rounded">
        @if (Auth::user()->pegawai->foto == null)
            <img src="../assets/images/users/1.jpg" width="30" height="30" class="img-circle" alt="img">
        @else
            <img src="/foto_pegawai/{{Auth::user()->pegawai->foto}}" width="30" height="30" class="img-circle" alt="img">
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
<div class="container-fluid">
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="/foto_pegawai/{{$show->foto ?: '../assets/images/users/5.jpg'}}" class="img-circle" width="150" height="150" />
                    <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                    <h6 class="card-subtitle">{{Auth::user()->pangkat->jabatan ?? 'Jabatan Belum Diisi !'}}</h6>
                    <h6 class="card-subtitle">NIK : {{$show->nik ?: 'Belum Diisi'}}</h6>
                    @if ($profileNull)
                        <a href="{{url('akun/'. Auth::user()->pegawai->id.'/'. 'edit')}}" class="btn btn-warning btn-sm">Lengkapi Profile</a>
                    @endif
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#changepassword">Change Password</button>
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
                                <p class="text-muted">{{Auth::user()->name ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>NIP</strong>
                                <br>
                                <p class="text-muted">{{Auth::user()->nip ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{Auth::user()->email ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                <br>
                                <p class="text-muted">{{Auth::user()->pegawai->alamat ?: 'Belum Diisi'}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>TTL</strong>
                                <br>
                                <p class="text-muted">{{$show->ttl ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Kelamin</strong>
                                <br>
                                <p class="text-muted">{{$show->kelamin ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Agama</strong>
                                <br>
                                <p class="text-muted">{{$show->agama ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Alamat</strong>
                                <br>
                                <p class="text-muted">{{$show->alamat ?: 'Belum Diisi'}}</p>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Gol Darah</strong>
                                <br>
                                <p class="text-muted">{{$show->goldarah ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>No. Askes</strong>
                                <br>
                                <p class="text-muted">{{$show->noaskes ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>No. Taspen</strong>
                                <br>
                                <p class="text-muted">{{$show->notaspen ?: 'Belum Diisi'}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>No. NPWP</strong>
                                <br>
                                <p class="text-muted">{{$show->nonpwp ?: 'Belum Diisi'}}</p>
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
<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="changePassword">
    <div class="modal-dialog" role="document">
       <form action="{{url('change-password', Auth::user()->id)}}" method="post">
           @csrf
           @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="changePassword">Change Password </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="new-password" class="control-label">New Password:</label>
                            <input type="password" name="password" class="form-control" id="new-password" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
       </form>
    </div>
</div>
@endsection