@extends('layouts.admin')
@section('title','Detail Data Pegawai')
@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{$show->nama}}</h4>
                    <h6 class="card-subtitle">{{$show->pangkat->jabatan}}</h6>
                </center>
            </div>
            <div>
                <hr> </div>
            <div class="card-body"> <small class="text-muted">Email address </small>
                <h6>{{$show->user->email}}</h6> <small class="text-muted p-t-30 db">NIP</small>
                <h6>{{$show->nip}}</h6> <small class="text-muted p-t-30 db">Address</small>
                <h6>{{$show->alamat}}</h6>
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
                        <div class="profiletimeline">
                            <div class="sl-item">
                                <div class="sl-left"> <img src="../assets/images/users/5.jpg" alt="user" class="img-circle" /> </div>
                                <div class="sl-right">
                                    <div><a href="#" class="link">{{$show->nama}}</a>
                                        <div class="row">
                                            <div class="col-lg-12"><img src="../assets/images/big/img1.jpg" class="img-responsive radius" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div
@endsection