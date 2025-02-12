<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$email = isset($_SESSION['email']) ? $_SESSION['email'] : "Usuário desconhecido";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-container {
            max-width: 500px;
            margin: 80px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="dashboard-container">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Bem-Vindo</h3>
                </div>
                <div class="card-body text-center">
                    <p class="fw-bold">Olá, <?= htmlspecialchars($email); ?>!</p>
                    <p class="text-danger">Essas informações <strong>PODEM</strong> ser acessadas por você.</p>
                    <a href="logout.php" class="btn btn-danger w-100">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>