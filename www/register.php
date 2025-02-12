<?php
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']); // Removemos espaços em branco extras
$connect = mysqli_connect('db', 'root', 'password', 'modelo1');

// Verifica se houve erro 
if (!$connect) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Verifica se os campos foram preenchidos
if (empty($nome)) {
    echo "<script>alert('O campo nome deve ser preenchido');window.location.href='register.html';</script>";
    exit();
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Informe um e-mail válido');window.location.href='register.html';</script>";
    exit();
}

if (empty($senha) || strlen($senha) < 6) { // Impede senha 
    echo "<script>alert('A senha deve ter pelo menos 6 caracteres');window.location.href='register.html';</script>";
    exit();
}

// Verifica se o e-mail já está cadastrado
$verifica = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
if (!$verifica) {
    die("Erro ao verificar e-mail: " . mysqli_error($connect));
}

if (mysqli_num_rows($verifica) > 0) {
    echo "<script>alert('Esse e-mail já está cadastrado');window.location.href='register.html';</script>";
    exit();
}

// Criptografa a senha 
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Insere o usuário 
$query = "INSERT INTO user (nome, email, senha) VALUES ('$nome', '$email', '$senha_hash')";
$insert = mysqli_query($connect, $query);

if ($insert) {
    echo "<script>alert('Usuário cadastrado com sucesso!');window.location.href='login.html';</script>";
    exit();
} else {
    echo "<script>alert('Não foi possível cadastrar esse usuário');window.location.href='register.html';</script>";
    exit();
}
