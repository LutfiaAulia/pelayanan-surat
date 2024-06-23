<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Penghasilan Orang Tua</title>
</head>

<body>

    <table align="center" width="500">
        <tr>
            <td valign="middle"><img src="{{ public_path('logoWN.png') }}" alt="Logo" height="100"></td>
            <td valign="middle">
                <center>
                    <font size="3"><b>PEMERINTAH KABUPATEN PADANG PARIAMAN</b></font><br>
                    <font size="3"><b>KECAMATAN LUBUK ALUNG</b></font><br>
                    <font size="3"><b>NAGARI PUNGGUANG KASIAK LUBUK ALUNG</b></font><br>
                    <font size="2"><b><i>Kantor: Jln. Raya Lubuk Alung - Pariaman Km. 2</i></b></font><br>
                    <font size="2"><b><i>Kode Pos: 25581</i></b></font>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
    </table>

    <table align="center" width="500">
        <tr>
            <td colspan="2">
                <center>
                    <font size="3"><b><u>SURAT KETERANGAN PENGHASILAN ORANG TUA</u></b></font><br>
                    <font size="3">Nomor: {{ $nomor_surat }}</font>
                </center>
            </td>
        </tr>
    </table>

    <br>

    <table align="center" width="500">
        <tr>
            <td colspan="2" style="text-align: justify; text-indent: 50px;">
                Yang bertanda tangan di bawah ini Wali Nagari Pungguang Kasiak Lubuk Alung Kecamatan Lubuk Alung Kabupaten Padang Pariaman menerangkan bahwa:
            </td>
        </tr>
    </table>

    <table align="center" width="500" style="margin-top: 20px;">
        <tr>
            <td>Nama</td>
            <td>: {{ $nama }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $nik }}</td>
        </tr>
        <tr>
            <td>Tempat/tgl. lahir</td>
            <td>: {{ $tgl_lahir }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>: {{ $agama }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $pekerjaan }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $alamat }}</td>
        </tr>
        <tr>
            <td>Penghasilan</td>
            <td>: {{ $penghasilan }}</td>
        </tr>
    </table>

    <table align="center" width="500" style="margin-top: 20px;">
        <tr>
            <td colspan="2" style="text-align: justify; text-indent: 50px;">
                Demikianlah surat keterangan penghasilan orang tua ini kami buat untuk dapat dipergunakan sebagai syarat untuk {{ $alasan }}.
            </td>
        </tr>
    </table>

    <br>

    <table align="right" width="800" style="margin-top: 20px;">
        <tr>
            <td align="right">
                <center>
                    <font size="2">Kelok, {{ \Carbon\Carbon::now()->isoFormat('DD MMMM YYYY') }}</font>
                </center>
                <center>
                    <font size="2"><b>A.n WALI NAGARI PUNGGUANG KASIAK</b></font>
                </center>
                <center>
                    <font size="2"><b>LUBUK ALUNG</b></font>
                </center>
            </td>
        </tr>
        <tr>
            <td height="70"></td>
        </tr>
        <tr>
            <td align="right">
                <center><b>DODI MARTEN</b></center>
            </td>
        </tr>
    </table>

</body>

</html>
