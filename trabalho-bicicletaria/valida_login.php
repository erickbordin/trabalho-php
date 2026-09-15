<?php
session_start();
include "conexao.php";

$email = mysqli_real_escape_string($conexao, $_POST['email']);

$resultado = mysqli_query($conexao, "SELECT id, nome, senha FROM usuarios WHERE email = '$email'");

if (mysqli_num_rows($resultado) == 0) {
    header("Location: login.php?erro=1");
} else {
    $usuario = mysqli_fetch_assoc($resultado);

    if (password_verify($_POST['senha'], $usuario['senha'])) {
        $_SESSION['usuario_id']   = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        header("Location: listar.php");
    } else {
        header("Location: login.php?erro=1");
    }
}
?>
