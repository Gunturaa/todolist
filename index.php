<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:user/?page=');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#062e3f">
    <meta name="Description" content="Modern and Elegant Landing Page.">

    <!-- Google Font: Work Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;600&display=swap" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

    <link rel="shortcut icon" type="image/png" href="assets/favicon.png" />
    <link rel="stylesheet" href="CSS/main.css">
    <title>ToDoList</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Work Sans', sans-serif;
            background-color: #121212;
            color: white;
            text-align: center;
        }

        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-primary:hover {
            background-color: white;
            color: black;
        }

        .btn-secondary {
            background-color: #f4b400;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #ffcc33;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #222;
            padding: 10px 0;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .footer img {
            width: 50px;
            height: auto;
        }

        .footer span {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
        }
    </style>
</head>

<body>
    <div class="hero">
        <h1>Buat Daftar, Selesaikan Tugas!</h1>
        <p>Catat, Rencanakan, Wujudkan.</p>
        <div class="btn-container">
            <a href="auth\login.php" class="btn btn-primary">LOGIN</a>
            <button class="btn btn-secondary"><a href="contact.php">CONTACT US</a></button>
        </div>
    </div>

    <div class="footer">
        <img src="assets\img\genoss.png" alt="Genoss Logo">
        <span>Genoss</span>
    </div>
</body>

</html>