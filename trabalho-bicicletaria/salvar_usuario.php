<?php
include "conexao.php";

$nome  = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$resultado = mysqli_query($conexao, "SELECT id FROM usuarios WHERE email = '$email'");

if (mysqli_num_rows($resultado) > 0) {
    header("Location: cadastro_usuario.php?erro=1");
    exit;
} else {
    mysqli_query($conexao, "INSERT INTO usuarios (nome, senha, email)
                            VALUES ('$nome', '$senha', '$email')");
    header("Location: login.php?cadastrado=1");
    exit;
}
?>
