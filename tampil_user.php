<html>
<head>
     <title>pemograman3.com</title>
</head>
<body>
    <h2>Pemograman 3 2022</h2>
    <br/>
    <a href="tambah_user.php">+ TAMBAH USER</a>
    <br/>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Password</th>
            <th>level</th>
            <th>status</th>
            <th>OPSI</th>
        </tr>
        <?php
        include 'koneksi.php';
        if ($_SESSION['level'] !== "admin") {
            // Jika tidak login atau level bukan admin atau staff, redirect ke halaman logout
            header("location: logout.php");
            exit();
        }
        $no = 1;
        $data = mysqli_query($koneksi,"select* from user");
        while ($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td><?php echo $d['level']; ?></td>
                <td><?php echo $d['status']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $d['id']; ?>">EDIT<
                    <a href="edit_user.php?id=<?php echo $d['id']; ?>">HAPUS<
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
    
