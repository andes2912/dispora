@extends('layouts.admin')
@section('title','Data Pegawai')
@section('content')
<div class="col-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Pegawai <a href="{{route('pegawai.create')}}" class="btn btn-primary btn-sm">Tambah</a></h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <td><a href="{{route('pegawai.show', $item->user_id)}}">{{$item->nip}}</a></td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->kelamin}}</td>
                                <td>{{$item->pangkat->jabatan ?? '' }}</td>
                                <td>
                                    @php
                                        $pangkat = App\pangkat::where('user_id', $item->user_id)->first();
                                    @endphp
                                    @if ($pangkat == NULL)
                                        <a href="{{url('pangkat')}}" class="btn btn-info btn-sm">Isi Pangkat</a>
                                    @endif
                                    <a class="btn btn-sm btn-success" data-id-pw="{{$item->user_id}}" id="resetpw" style="color:white">Reset</a>

                                    <a href="{{route('pegawai.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>

                                    <button type="button" class="btn btn-danger btn-sm deleteUser" data-toggle="modal" data-target="#confirmdelete" data-id="{{$item->user_id}}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   {{-- Konfirmasi Delete --}}
   <div class="modal fade" id="confirmdelete" tabindex="-1" role="dialog" aria-labelledby="confirmdelete">
    <div class="modal-dialog" role="document">
    <form action="{{url('delete-pegawai')}}" method="post">
        @csrf
        @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirmdelete">Hapus Pegawai </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p class="text-center">Yakin Ingin Menghapus ?</p>
                        <input type="hidden" name="user_id" id="app_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Hapus</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
    </form>
    </div>
</div>
{{-- End Konfirmasi Delete --}}
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    // Delete User 
    $(document).on('click','.deleteUser',function(){
        var userID=$(this).attr('data-id');
        $('#app_id').val(userID); 
        $('#confirmdelete').modal('show'); 
    });

    // Reset Password User 
    $(document).on('click','#resetpw', function () {
        var user_id = $(this).attr('data-id-pw');
        $.get(' {{Url("reset-password-pegawai")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),user_id:user_id}, function(resp){
            localStorage.setItem("swal", JSON.stringify({
                        title: "Password Berhasil Di Reset!",
                        text: 'Thanks',
                        icon: "success",
                        button: true
                    }));

                    swal(JSON.parse(localStorage.getItem("swal"))).then(() => location.reload());
        });
    });
</script>
@endsection