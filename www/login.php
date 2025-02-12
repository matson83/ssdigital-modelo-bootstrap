<?php
session_start();
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$connect = mysqli_connect('db', 'root', 'password', 'modelo1');

if (empty($email) || empty($senha)) {
    echo "<script>alert('Preencha todos os campos!');window.location.href='login.html';</script>";
    exit();
}

$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($senha, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Senha incorreta!');window.location.href='login.html';</script>";
        exit();
    }
} else {
    echo "<script>alert('E-mail não cadastrado!');window.location.href='login.html';</script>";
    exit();
}
