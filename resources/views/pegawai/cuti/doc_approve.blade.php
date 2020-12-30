<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document Approval</title>
  <style>
    .title {
      font-weight: 100;
      text-align: center;
    }

    .sec_title {
      text-align: center
    }

    .container {
      display: table;
      width: 100%;
    }

    .left {
      position: absolute;
      left: 0px;
      width: 50%;
    }

    .right {
      position: absolute;
      right: 0px;
      width: 50%;
    }

    .left_ {
     text-indent: 120px;
    }

    .content p{
      text-indent: 100px
    }

    .footer {
      position: absolute;
      right: 0px;
      width: 40%;
    }
  </style>
</head>
<body>
<header>
  <p class="title">
    PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA <br>
    DINAS PEMUDA DAN OLAHRAGA
  </p>
  <p class="sec_title">
    Jalan Jatinegara Timur nomor 55 Telepon 8193548, 8517241, Faksimile 8193548 <br>
    website dispora.jakarta.go.id  e-mail dispora@jakarta.go.id <br>
    twitter @disordadkijkt  facebook Disorda DKI Jakarta <br>
    JAKARTA
  </p>
  <hr>
  <section class="container">
    <div class="left">
    Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : CUTI/{{$approval_cuti->id}}/{{auth::user()->id}}<br>
    Sifat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : -<br>
    Lampiran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : -<br>
    Hal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pengajuan Cuti
  </div>

  <div class="right">
   <div style="text-indent: 50%">
      Jakarta, {{$approval_cuti->date}}
   </div>
  </div>
  </section>

</header>
<br><br><br><br><br><br>
<div class="content">
  <p>
  Isi paragraf Cuti
  </p>
</div>

<div class="footer">
  Kepala Dinas Pemuda dan Olahraga <br>
  Provinsi Daerah Khusus Ibukota Jakarta,

  <br><br><br><br><br><br>
  <p style="text-align: center">
    Dr. H. Ratiyono, MMSI
  NIP 195909271984031010
  </p>
</div>
</body>
</html>