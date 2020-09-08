<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Data Pegawai</title>
</head>
<body>
  <table>
    <thead>
    <tr>
        <th>No.</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Kelamin</th>
        <th>Jabatan</th>
        <th>Agama</th>
    </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach ($pegawai as $item)
        <tr>
            <td>{{$no}}</td>
            <td>{{$item->nip}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->pegawai->kelamin}}</td>
            <td>{{$item->pangkat->jabatan ?? '' }}</td>
            <td>{{$item->pegawai->agama}}</td>
        <?php $no++; ?>
        @endforeach
    </tbody>
    </table>
</body>
</html>