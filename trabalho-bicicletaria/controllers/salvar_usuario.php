<?php
session_start();
include "../includes/validacao.php";
include "../config/conexao.php";
include "../services/usuario_service.php";
include "../services/upload_service.php";

$paginaVolta = "../views/cadastro_usuario.php";

validarEnvioFormulario($paginaVolta);

$nome = lerCampo("nome");
$email = lerCampo("email");
$senha = lerCampo("senha");

$erro = validarUsuario($nome, $email, $senha);

if ($erro == "" && buscarUsuarioPorEmail($conexao, $email)) {
    $erro = "Este e-mail já está cadastrado.";
}

if ($erro == "") {
    $erro = validarImagem($_FILES['foto'] ?? null);
}

if ($erro != "") {
    voltarComErro($erro, $paginaVolta);
}

$nomeFoto = salvarImagem($_FILES['foto']);

cadastrarUsuario($conexao, $nome, $email, $senha, $nomeFoto);

header("Location: ../views/login.php?cadastrado=1");
exit;
