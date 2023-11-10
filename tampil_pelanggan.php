<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="tambah_member.php">+ Tambah pelanggan</a>
    <br>
    <table border="1">
            <th>kode pelanggan</th>
            <th>Nama pelanggan</th>
            <th>Level</th>
            
        </tr>
        <?php
            include 'koneksi.php';
            session_start();

                if (!isset($_SESSION['level']) || ($_SESSION['level'] !== "admin" && $_SESSION['level'] !== "mgr")) {
                    // Jika tidak login atau level bukan admin atau staff, redirect ke halaman logout
                    header("location: logout.php");
                    exit();
                }
            $no = 1;
            $data = mysqli_query($koneksi,"Select * From pelanggan");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $d['kode_pelanggan'];?></td>
            <td><?php echo $d['nama_pelanggan'];?></td>
            <td><?php echo $d['level'];?></td>
            <td>
                <a href="edit_transaksi.php?id=<?php echo $d['id_pelanggan']; ?>">Edit</a>
                <a href="hapus_transaksi.php?id=<?php echo $d['id_pelanggan']; ?>">Hapus</a>
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>