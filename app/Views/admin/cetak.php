<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penilaian</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            /* font-family: Georgia, 'Times New Roman', Times, serif; */
        }

        body{
            margin: 4px 4px;
        }

        header{
            padding: 10px;
        }

        header h1{
            text-align: center;
            
            margin-top: 13px;
            margin-bottom: 3px;
            letter-spacing: 4px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        header h4{
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin-bottom: 30px;
            letter-spacing: 2px;
        }

        header .container {
            overflow: auto; /* Menangani clear float */
        }
        
        header .table-left {
            float: left;
            margin-right: 20px; /* Jarak antara kedua tabel */
        }
        
        header .table-right {
            float: right;
        }

        header .container table td{
            padding: 2px 6px;
        }

        header .clear{
            clear: both;
            margin-bottom: 30px;
        }

        header .line {
            margin-top: 5px;
            height: 2px;
            width: 100%;
            border-radius: 10px;
            background-color: black;
        }

        header .line2 {
            margin-top: 2px;
            height: 2px;
            width: 100%;
            border-radius: 10px;
            background-color: black;
        }

        /* MAIN */

        main{
            padding: 15px;
        }

        main .container-soal{
            margin-bottom: 20px;
        }

        main .container-soal .judul-soal{
            padding: 3px 9px;
            font-size: 15px;
            font-weight: 500;
        }

        main .container-soal .soal{
            
            /* background-color: #ededed; */
            border: 2px solid black;
            border-radius: 10px;
            padding: 5px 9px;
        }

        .page-break{
            page-break-after: always;
        }

        /* FOOTER  */

        .page-user{
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            bottom: 20px;
        }

        .page-user p{
            font-size: 15px;
        }

        .page-number{
            position: fixed;
            bottom: 20px;
            right: 15px;
        }

        

        .page-number p::after{
            content: "page " counter(page);
        }

    </style>
    
</head>
<body>
    <?php 
        $waktu_mulai = strtotime($user[0]['waktu_mulai']);
        $waktu_selesai = strtotime($user[0]['waktu_selesai']);
        $selisih = $waktu_selesai - $waktu_mulai;
        $jam = floor($selisih / 3600);
        $sisa = $selisih % 3600;
        $menit = floor($sisa / 60);
        $detik = $sisa % 60;
    ?>
        <header>
            <h1>IMEV 12</h1>
            <h4>Invention Of Mechanical Engineering Venture</h4>
            <div class="container">
                <table class="table-left">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= ucwords($user[0]['nama']) ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?= $user[0]['email'] ?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?= $user[0]['nim'] ?></td>
                    </tr>
                    <tr>
                        <td>Universitas</td>
                        <td>:</td>
                        <td><?= strtoupper($user[0]['univ']) ?></td>
                    </tr>
                </table>
                <table class="table-right">
                    <tr>
                        <td>Jumlah Soal</td>
                        <td>:</td>
                        <td><?= $jmlSoal?></td>
                    </tr>
                    <tr>
                        <td>Waktu Mulai</td>
                        <td>:</td>
                        <td><?= date('j M Y H:i:s', strtotime($user[0]['waktu_mulai'])) ?></td>
                    </tr>
                    <tr>
                        <td>Waktu Selesai</td>
                        <td>:</td>
                        <td><?= date('j M Y H:i:s', strtotime($user[0]['waktu_selesai'])) ?></td>
                    </tr>
                    <tr>
                        <td>Lama Pengerjaan</td>
                        <td>:</td>
                        <td><?= $jam ?> jam <?= $menit ?> menit <?= $detik ?> detik</td>
                    </tr>
                </table>
                <div class="clear"></div>
                <div class="line"></div>
                <div class="line2"></div>
            </div>
        </header>
        <main>
            <?php $i = 1 ?>
            <?php foreach ($soalJawaban as $row) : ?>
                <div class="container-soal">    
                    <p class="judul-soal">Soal <?= $i ?></p>
                    <div class="soal">
                        <p class="" ><?= $row['soal'] ?></p>
                        <br>
                        <p>Jawaban : </p>
                        <p><i><?= $row['jawaban'] ?></i></p>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endforeach ?>
        </main>
</body>
</html>