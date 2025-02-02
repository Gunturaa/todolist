<?php
require_once "db.php";
session_start();
$error = '';
$validate = '';

// Jika pengguna sudah login, arahkan ke halaman yang sesuai
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location: ../admin/dashboard');
    } else {
        header('Location: ../user/index?page=');
    }
}

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($link, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($link, $password);

    // Jika username dan password tidak kosong
    if (!empty(trim($username)) && !empty(trim($password))) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($link, $query);
        $rows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        // Jika data pengguna ditemukan
        if ($rows != 0) {
            $hash = $row['password'];

            // Jika password sesuai
            if (password_verify($password, $hash)) {
                $_SESSION['username'] = $row["username"];
                $_SESSION['name'] = $row['name'];
                $_SESSION['foto_profil'] = $row['foto_profil'];
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['role'] = $row['role']; // Simpan role pengguna ke session

                // Redirect berdasarkan role
                if ($_SESSION['role'] == 'admin') {
                    header('Location: ../admin/dashboard');
                } else {
                    header('Location: ../user/index?page=');
                }
            } else {
                $error = 'Password Salah!!!';
            }
        } else {
            $error = 'Login User Gagal!!!';
        }
    } else {
        $error = 'Data Tidak Boleh Kosong!!!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        .login-box h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .login-box .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
        }

        .login-box .form-control:focus {
            border-color: #667eea;
            box-shadow: none;
        }

        .login-box .btn-primary {
            background: #667eea;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            width: 100%;
        }

        .login-box .btn-primary:hover {
            background: #5a6fd1;
        }

        .login-box .alert {
            border-radius: 10px;
        }

        .login-box .text-center a {
            color: #667eea;
            text-decoration: none;
        }

        .login-box .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h1>Log in</h1>
        <?php if ($error != '') : ?>
            <div class="alert alert-danger" role="alert"><?= $error ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['msg'];
                unset($_SESSION['msg']) ?>
            </div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
        </form>
        <div class="text-center mt-3">
            <a href="forgot-password.html">Lupa Password?</a>
        </div>
        <div class="text-center mt-2">
            <a href="register">Belum punya akun? Daftar disini!</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>