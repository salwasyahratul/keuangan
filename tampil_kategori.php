<!DOCTYPE html>
<html>
<head>
     <title>tampil kategori</title>
</head>
<body>
     <h2>pemograman 1 2023</h2>
     <br>
     <a href="tambah_kategori.php">+Tambah kategori</a>
     <br>
     <table border="1">
          <tr> 
             <th>Id</th>
             <th>Nama kategori</th>
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
              $data = mysqli_query($koneksi,"select * from kategori");
              while($d = mysqli_fetch_array($data)){
               ?>
          <tr>
               <td><?php echo $no++; ?></td>
               <td><?php echo $d['nama_kategori']; ?></td>
               <td>
               <a href="edit_kategori.php?id=<?php echo $d['id_kategori']; ?>">Edit</a>
               <a href="hapus_kategori.php?id=<?php echo $d['id_kategori']; ?>">Hapus</a>
              </td>
          </tr>
          <?php
              }
              ?>
     </table>
          </body>
          </html>
