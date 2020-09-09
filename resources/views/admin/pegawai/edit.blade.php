@extends('layouts.admin')
@section('title','Edit Data Pegawai')
@section('content')
<div class="col-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Informasi Data Pegawai</h4>
        </div>
        <div class="card-body">
            <form action="{{route('pegawai.update', $edit->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nama Pegawai</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{$edit->nama}}" >
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$edit->email}}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nomor Induk Pegawai (NIP)</label>
                                <input type="text" name="nip" id="nip" class="form-control" value="{{$edit->nip}}">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tipe PNS</label>
                                <input type="text" name="tipepns" id="tipepns" class="form-control" value="{{$edit->tipepns}}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Status</label>
                                <input type="text" value="Aktif" class="form-control" value="{{$edit->status}}">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tanggal Lahir</label>
                                <input type="date" name="ttl" class="form-control" value="{{$edit->ttl}}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <textarea name="tempatlahir" class="form-control" rows="4">{{$edit->tempatlahir}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Saat Ini</label>
                                <textarea name="alamat" class="form-control" rows="4">{{$edit->alamat}}</textarea>
                            </div>
                        </div>
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor NPWP</label>
                                <input type="text" name="nonpwp" class="form-control" value="{{$edit->nonpwp}}">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Induk Keluarga</label>
                                <input type="number" name="nik" class="form-control" value="{{$edit->nik}}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Jenis Kelamin</label>
                                <select class="form-control custom-select" name="kelamin" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="Laki-Laki" {{$edit->kelamin == 'Laki-laki' ? 'selected' : ''}} >Laki-Laki</option>
                                    <option value="Perempuan" {{$edit->kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Agama</label>
                                <select class="form-control custom-select" name="agama" data-placeholder="Choose a Category">
                                    <option value="Islam" {{$edit->agama == 'Islam' ? 'selected' : ''}} >Islam</option>
                                    <option value="Kristen" {{$edit->agama == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                                    <option value="Budha" {{$edit->agama == 'Budha' ? 'selected' : ''}}>Budha</option>
                                    <option value="Hindu" {{$edit->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--/row-->

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control custom-select" name="statusnikah" data-placeholder="Choose a Category">
                                    <option value="Menikah" {{$edit->statusnikah == 'Menikah' ? 'selected' : ''}} >Menikah</option>
                                    <option value="Lajang" {{$edit->statusnikah == 'Lajang' ? 'selected' : ''}} >Lajang</option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kedudukan</label>
                               <input type="text" name="kedudukanpns" class="form-control" value="{{$edit->kedudukanpns}}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gol. Darah</label>
                                <input type="text" name="goldarah" class="form-control" value="{{$edit->goldarah}}">
                            </div>
                        </div>
                        <!--/span-->
                        @if ($edit->foto == NULL && $edit->user_id == Auth::user()->id)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Pegawai</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                            </div>
                        @endif
                        <!--/span-->
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                    <a href="{{url('pegawai')}}" class="btn btn-warning"> <i class="fa fa-close"> Cancel</i> </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection