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
            padding: 0 5px;
        }

        main .container-soal .soal{
            
            background-color: #ededed;
            border-radius: 10px;
            padding: 5px 9px;
        }

    </style>
    
</head>
<body>
    <header>
        <h1>IMEV 12</h1>
        <h4>Invention Of Mechanical Engineering Venture</h4>
        <div class="container">
            <table class="table-left">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $user['0']['nama'] ?></td>
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
                    <td><?= $user[0]['univ'] ?></td>
                </tr>
            </table>
            <table class="table-right">
                <tr>
                    <td>Jumlah Soal</td>
                    <td>:</td>
                    <td><?= $jmlSoal?></td>
                </tr>
                <tr>
                    <td>Soal Terjawab</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Waktu Mulai</td>
                    <td>:</td>
                    <td><?= date('d-M-Y H:i:s', strtotime($user[0]['waktu_mulai'])) ?></td>
                </tr>
                <tr>
                    <td>Waktu Selesai</td>
                    <td>:</td>
                    <td><?= date('d-M-Y H:i:s', strtotime($user[0]['waktu_selesai'])) ?></td>
                </tr>
            </table>
            <div class="clear"></div>
            <div class="line"></div>
            <div class="line2"></div>
        </div>
    </header>
    <main>
        <?php $i = 1 ?>
        <?php foreach($soalJawaban as $row) : ?>
            
            <div class="container-soal">    
                <p class="judul-soal">Soal <?= $i ?></p>
                <div class="soal">
                    <p class=""><?= $row['soal'] ?></p>
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