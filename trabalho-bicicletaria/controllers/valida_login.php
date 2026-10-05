<?php
session_start();
include "../includes/validacao.php";
include "../config/conexao.php";
include "../services/usuario_service.php";

validarEnvioFormulario("../views/login.php");

$usuario = verificarLogin($conexao, lerCampo("email"), lerCampo("senha"));

if (!$usuario) {
    header("Location: ../views/login.php?erro=1");
    exit;
}

session_regenerate_id(true);

$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_nome'] = $usuario['nome'];
$_SESSION['usuario_foto'] = $usuario['foto'];

header("Location: ../views/listar.php");
exit;
