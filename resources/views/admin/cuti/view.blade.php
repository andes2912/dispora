@extends('layouts.admin')
@section('title','Cuti Pegawai')
@section('content')
<div class="col-12">
    <div class="card">     
        <div class="card-body">
            <h4 class="card-title">Data Cuti Pegawai</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="form-body">
                <form action="{{route('cuti.update', $cuti->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">NIP</label>
                                <input type="text" value="{{$cuti->nip}}" class="form-control border-primary" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">Nama</label>
                                <input type="text" value="{{$cuti->nama}}" class="form-control border-primary" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <input type="text" value="{{$cuti->status_approval}}" class="form-control border-primary" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Tanggal Cuti</label>
                                <div class="row">
                                    @foreach ($date_cuti as $item)
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <input type="text" value="{{$item->date_leave}}" class="form-control border-primary" readonly>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                @if ($cuti->status_approval == 'Proses')
                                    <select name="status_approval" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Reject">Reject</option>
                                    </select>
                                @else
                                    <input type="text" value="{{$cuti->status_approval}}" class="form-control" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Menyetujui</label>
                                <input type="text" value="{{auth::user()->name}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Alasan Pegawai</label>
                                <textarea name="reason" rows="3" class="form-control border-primary" readonly>{{$cuti->reason}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Alasan</label>
                                @if ($cuti->reason_approval == null)
                                    <textarea name="reason_approval" rows="3" class="form-control border-primary" required></textarea>
                                @else
                                    <textarea rows="3" class="form-control" readonly>{{$cuti->reason_approval}}</textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                @if ($cuti->status_approval == 'Proses')
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    <a href="" class="btn btn-warning btn-sm">Back</a>
                                @else
                                    <a href="{{route('cuti.index')}}" class="btn btn-warning btn-sm">Back</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection