<!DOCTYPE html>
<html>
<head>
    <title>pemograman3.com</title>
</head>
<?php
//koneksi database
include 'koneksi.php';

session_start();

                if ($_SESSION['level'] !== "admin") {
                    // Jika tidak login atau level bukan admin atau staff, redirect ke halaman logout
                    header("location: logout.php");
                    exit();
                }
//menangkap data yang di kirim dari form
if (!empty($_POST['save'])){
 
    $Nama = $_POST['Nama'];
    $Password = $_POST['Password'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    //menginput data ke database

    $hashpw = md5($Password);
    $a=mysqli_query($koneksi,"insert into user values('','$Nama','$hashpw','$level','$status')");
    if($a){
        //mengalihkan halaman kembali
        header("location:tambah_user.php");
    }else{
        echo mysqli_error();
    }
}  

?>  
<body>
    <h2>pemograman3 2023</h2>
    <br/>
    <a href="http://localhost/keuangan/tampil_user.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>TAMBAH DATA USER</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
             <td>Password</td>
             <td><input type="text" name="Password"></td>
        </tr>
        <tr>
            <td>level</td>
            <td><select name="level">
                <option value="">-----pilih</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="spv">Spv</option>
                <option value="mgr">Mgr</option>
</select>
</td>
</tr>
<tr>
    <td>status</td>
    <td><select name="status">
        <option value="">-----pilih</option>
        <option value="1">Aktif</option>
        <option value="0">tdk aktif</option>
</select>
</td>
</tr>
<tr>
    <td><td>
        <td><input type="submit" name="save"></td>
</tr>
</table>
</form>
</body>
</html>