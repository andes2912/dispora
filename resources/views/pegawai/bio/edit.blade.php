@extends('layouts.admin')
@section('title','Edit Data Pegawai')
@section('content')
<div class="col-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Informasi Data Pegawai</h4>
        </div>
        <div class="card-body">
            <form action="{{route('akun.update', Auth::user()->pegawai->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nama Pegawai</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{Auth::user()->name}}" autocomplete="off" readonly>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nomor Induk Pegawai (NIP)</label>
                                <input type="text" name="nip" id="nip" class="form-control" value="{{Auth::user()->nip}}" autocomplete="off" readonly>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tipe PNS</label>
                                <input type="text" name="tipepns" id="tipepns" class="form-control" value="{{Auth::user()->pegawai->tipepns}}" autocomplete="off" readonly>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Status</label>
                                <input type="text" value="Aktif" class="form-control" value="{{Auth::user()->status}}" autocomplete="off" readonly>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tanggal Lahir</label>
                                <input type="text" name="ttl" class="form-control datepicker" value="{{Auth::user()->pegawai->ttl}}" autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <textarea name="tempatlahir" class="form-control" rows="4">{{Auth::user()->pegawai->tempatlahir}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Saat Ini</label>
                                <textarea name="alamat" class="form-control" rows="4">{{Auth::user()->pegawai->alamat}}</textarea>
                            </div>
                        </div>
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor NPWP</label>
                                <input type="number" name="nonpwp" class="form-control" value="{{Auth::user()->pegawai->nonpwp}}" autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Induk Keluarga</label>
                                <input type="number" name="nik" class="form-control" value="{{Auth::user()->pegawai->nik}}" autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                     <!--/row-->
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Askes</label>
                                <input type="number" name="noaskes" class="form-control" value="{{Auth::user()->pegawai->noaskes}}" autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Taspen</label>
                                <input type="number" name="notaspen" class="form-control" value="{{Auth::user()->pegawai->notaspen}}" autocomplete="off">
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
                                    <option value="Laki-Laki" @if(Auth::user()->pegawai->kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if(Auth::user()->pegawai->kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Agama</label>
                                <select class="form-control custom-select" name="agama" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="Islam" @if(Auth::user()->pegawai->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen" @if(Auth::user()->pegawai->agama == 'Kristen') selected @endif>Kristen</option>
                                    <option value="Budha" @if(Auth::user()->pegawai->agama == 'Budha') selected @endif>Budha</option>
                                    <option value="Hindu" @if(Auth::user()->pegawai->agama == 'Hindu') selected @endif>Hindu</option>
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
                                <select class="form-control custom-select" name="statusnikah" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="Menikah" @if(Auth::user()->pegawai->statusnikah == 'Menikah') selected @endif>Menikah</option>
                                    <option value="Lajang" @if(Auth::user()->pegawai->statusnikah == 'Lajang') selected @endif>Lajang</option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kedudukan</label>
                               <input type="text" name="kedudukanpns" class="form-control" value="{{Auth::user()->pegawai->kedudukanpns}}" autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gol. Darah</label>
                                <input type="text" name="goldarah" class="form-control" value="{{Auth::user()->pegawai->goldarah}}" autocomplete="off">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Pegawai</label>
                                {{-- @if (Auth::user()->pegawai->foto == NULL ) --}}
                                    <input type="file" name="foto" class="form-control">
                                {{-- @endif --}}
                            </div>
                        </div>
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
@section('scripts')
    <script type="text/javascript">
        $(".datepicker").datepicker( {
            todayHighlight: !0,
            orientation: "bottom left",
        })
    </script>
@endsection