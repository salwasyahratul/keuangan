<!DOCTYPE html>
<html>
<head>
    <title>tambah_pelanggan</title>
</head>
<?php
    //koneksi database
    include 'koneksi.php';
    //menangkap data yang dikirim dari form
    if(!empty($_POST['save'])){
        
        $Kode = $_POST['kode_pelanggan'];
        $Nama = $_POST['nama_pelanggan'];
        $level = $_POST['level'];
        //menginput data ke database
        $a = mysqli_query($koneksi,"insert into pelanggan values('$Kode','$Nama','$level')");
        if($a){
            //mengalihkan ke halaman kembali
            header("location:tampil_pelanggan.php");
        }else{
            echo mysqli_error($koneksi);
        }
    }
?>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="tambah_pelanggan.php">Kembali</a>
    <br>
    <h3>TAMBAH DATA PELANGGAN</h3>
    <form method="POST">
        <table>
            
            <tr>
                <td>Kode pelanggan</td>
                <td><input type="number" name="kode_pelanggan"></td>
            </tr>
            <tr>
                <td>Nama pelanggan</td>
                <td><input type="text" name="nama_pelanggan"></td>
            </tr>
 <tr>
            <td>level</td>
            <td><select name="level">
                <option value="">-----pilih</option>
                <option value="Gold">Gold</option>
                <option value="Silver">Silver</option>
                <option value="Platinum">Platinum</option>
                
</select>
</td>
</tr>       
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>