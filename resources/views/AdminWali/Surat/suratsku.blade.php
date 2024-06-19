<!-- resources/views/surat_keterangan_usaha.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Usaha</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            margin: 0;
            padding: 0;
            line-height: 1.15;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background-color: #f0f0f0;
            height: 100vh;
            overflow-y: auto;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            background: white;
            border: 1px solid #d3d3d3;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            box-sizing: border-box;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            text-align: center;
            width: 100%;
        }
        .header .logo {
            flex: 1;
            text-align: left;
        }
        .header .text {
            flex: 4;
            text-align: center;
        }
        .header img {
            width: 100px; /* Sesuaikan ukuran logo sesuai kebutuhan */
            height: auto;
        }
        hr {
            border: 0;
            border-top: 3px solid black;
            margin: 10px 0;
            width: 100%;
        }
        .content {
            margin-top: 20px;
        }
        .content table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .content table td {
            padding: 5px;
            vertical-align: top;
        }
        .signature {
            text-align: right;
            margin-top: 50px;
        }
        .signature p {
            margin: 0;
        }
        .title {
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .doc-number {
            text-align: center;
            margin-bottom: 20px;
        }
        .indented {
            text-indent: 1em;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="header">
            <div class="logo">
                <img src="logoWN.png" alt="Logo"> <!-- Ubah path sesuai lokasi logo -->
            </div>
            <div class="text">
                <h2>PEMERINTAH KABUPATEN PADANG PARIAMAN</h2>
                <h3>KECAMATAN LUBUK ALUNG</h3>
                <h3>NAGARI PUNGGUANG KASIAK LUBUK ALUNG</h3>
                <p>Kantor: Jln. Raya Lubuk Alung - Pariaman Km. 2</p>
                <p>Kode Pos : 25581</p>
            </div>
        </div>
        <hr>
        <div class="content">
            <div class="title">
                <h3><u>SURAT KETERANGAN USAHA</u></h3>
            </div>
            <div class="doc-number">
                <p>Nomor: 09/SKPOT-PKLA/III-2024</p>
            </div>
            <p class="indented">Yang bertanda tangan di bawah ini Wali Nagari Pungguang Kasiak Lubuk Alung Kecamatan Lubuk Alung Kabupaten Padang Pariaman menerangkan bahwa:</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: SUSANTO</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>: 130501988906020001</td>
                </tr>
                <tr>
                    <td>Tempat/tgl.lahir</td>
                    <td>: Sintuk 20-07-1976</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: Islam</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td>: Belum Kawin</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: Pedagang</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: Korong Kelok Nagari Pungguang Kasiak Lubuk Alung, Kecamatan Lubuk Alung</td>
                </tr>
            </table>
            <p class="indented">Menurut sepengetahuan kami dan berdasarkan data dari Wali Korong Kelok Nagari Pungguang Kasiak Lubuk Alung, bahwa yang bersangkutan benar-benar memiliki usaha Warung Kopi.</p>
            <p class="indented">Demikianlah surat keterangan usaha ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p>
            <div class="signature">
                <p>Kelok, 07 Maret 2024</p>
                <p>A.n WALI NAGARI PUNGGUANG KASIAK LUBUK ALUNG</p>
                <br><br><br>
                <p>ttd dan stempel wali nagari</p>
                <p>DODI MARTEN</p>
            </div>
        </div>
    </div>
</body>
</html>