<?php
require_once "../auth/db.php";

function cekSameWorkspace($goal, $link)
{
    $query = "SELECT COUNT(*) as count FROM workspace WHERE nm_goal = '$goal'";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['count'];
}

if (isset($_POST['submit'])) {
    if (!$link) {
        die('Database connection failed: ' . mysqli_connect_error());
    }

    $goal = $_POST['nm_goal'];
    $desc = $_POST['desc'];
    $user = $_SESSION['id_user'];
    if (cekSameWorkspace($goal, $link) == 0) {
        $mysql = "INSERT INTO workspace (nm_goal, deskripsi, id_user) VALUES ('$goal', '$desc', '$user')";
        if (mysqli_query($link, $mysql)) {
            echo "<div class='alert alert-success'>New workspace created successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($link) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Workspace with the same name already exists.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Workspace</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .form-container label {
            font-weight: 500;
        }

        .form-container .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Add Workspace</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nm_goal" class="form-label">Workspace Name</label>
                <input type="text" class="form-control" id="nm_goal" name="nm_goal" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Workspace</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>