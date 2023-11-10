<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add Bootstrap 5 CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                    <?php
                        session_start();

                        // Check if the user is already logged in, redirect to home if true
                        if (isset($_SESSION['nama'])) {
                            header("location: index.php");
                            exit();
                        }

                        // Include database connection
                        include 'koneksi.php';

                        // Handle form submission
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $Nama = $_POST["nama"];
                            $password = $_POST["password"];

                            // Use prepared statement to prevent SQL injection
                            $query = "SELECT * FROM user WHERE nama=?";
                            $stmt = mysqli_prepare($koneksi, $query);
                            mysqli_stmt_bind_param($stmt, "s", $Nama);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            // Check if the query was successful
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                
                             //  $m = $row && password_verify($password, $row['password']); // password hash
                               
                               $md = $row && md5($password) === $row['password']; //md5
                              // var_dump($md);

                                if ($md) {
                                    // Set session variables
                                    $_SESSION['nama'] = $Nama;
                                    $_SESSION['level'] = $row['level'];

                                    // Redirect based on user level
                                    if ($_SESSION['level'] == 'admin') {
                                
                                        header("location: dashboard_admin.php");

                                    }else if ($_SESSION['level'] == 'mgr') {
                                         header("location: dashboard_mgr.php");
                                    }
                                     else {
                                        echo '<div class="alert alert-danger" role="alert">Kamu belum terdaftar, silahkan mendaftar dengan menghubungi pihak Admin.</div>';
                                    }
                                    exit();
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Login failed. Please check your Nama and password.</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($koneksi) . '</div>';
                            }
                        }


                        ?>
                        <!-- Login Form -->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap 5 JS and Popper.js (for Bootstrap dropdowns, tooltips, and popovers) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>