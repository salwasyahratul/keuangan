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