@extends('layouts.admin')
@section('title','Tambah Data Kadis')
@section('content')
<div class="col-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Informasi Data Kadis</h4>
        </div>
        <div class="card-body">
            <form action="{{route('pegawai.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nama Kadis</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama" required autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->

                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIP</label>
                               <input type="text" name="nip" class="form-control" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kedudukan</label>
                               <input type="text" name="kedudukanpns" class="form-control" required autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Tipe PNS</label>
                                <input type="text" name="tipepns" id="tipepns" class="form-control" placeholder="Honorer" required autocomplete="off">
                            </div>
                        </div>
                        <input type="hidden" name="role" value="Kadis">
                        <!--/span-->
                    </div>
                    <!--/row-->
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                    <a href="{{url('index-kadis')}}" class="btn btn-inverse">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    
@endsection