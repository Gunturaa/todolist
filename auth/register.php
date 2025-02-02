<?php
require_once "db.php";
session_start();

$salah = '';
$validate = '';
if (isset($_SESSION['username'])) header('Location: ../user/index');

if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($link, $username);
    $name = stripslashes($_POST['name']);
    $name = mysqli_real_escape_string($link, $name);
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($link, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($link, $password);
    $repass = stripslashes($_POST['repassword']);
    $repass = mysqli_real_escape_string($link, $repass);
    $fotoProfil = "new_user.png";

    if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
        if ($password == $repass) {
            if (cek_nama($username, $link) == 0) {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (username, name, email, password, foto_profil) VALUES ('$username', '$name', '$email', '$pass', '$fotoProfil')";
                $result = mysqli_query($link, $query);

                if ($result) {
                    $query = "SELECT * FROM users WHERE username = '$username'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $name;
                    $_SESSION['foto_profil'] = $row['foto_profil'];
                    $_SESSION['id_user'] = $row['id_user'];
                    header('Location: ../user/index?page=');
                } else {
                    $salah = 'Registrasi User Gagal!';
                }
            } else {
                $salah = 'Username Telah Terdaftar!';
            }
        } else {
            $validate = 'Password Tidak Sama!';
        }
    } else {
        $salah = 'Data Tidak Boleh Kosong!';
    }
}

function cek_nama($username, $link)
{
    $nama = mysqli_real_escape_string($link, $username);
    $query = "SELECT * FROM users WHERE username = '$nama'";
    if ($result = mysqli_query($link, $query))
        return mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-box {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        .register-box h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .register-box .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
        }

        .register-box .form-control:focus {
            border-color: #667eea;
            box-shadow: none;
        }

        .register-box .btn-primary {
            background: #667eea;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            width: 100%;
        }

        .register-box .btn-primary:hover {
            background: #5a6fd1;
        }

        .register-box .alert {
            border-radius: 10px;
        }

        .register-box .text-center a {
            color: #667eea;
            text-decoration: none;
        }

        .register-box .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-box">
        <h1>Daftar Akun Baru</h1>
        <?php if ($salah != '') : ?>
            <div class="alert alert-danger" role="alert"><?= $salah ?></div>
        <?php endif; ?>
        <?php if ($validate != '') : ?>
            <div class="alert alert-danger" role="alert"><?= $validate ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Ulangi Password" name="repassword" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                <label class="form-check-label" for="agreeTerms">Saya menyetujui syarat dan ketentuan</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
        </form>
        <div class="text-center mt-3">
            <a href="login">Sudah punya akun? Masuk disini</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>