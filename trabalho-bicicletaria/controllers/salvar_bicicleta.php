<?php
include "../includes/sessao.php";
include "../includes/validacao.php";
include "../config/conexao.php";
include "../services/bicicleta_service.php";
include "../services/upload_service.php";

$paginaVolta = "../views/cadastrar_bicicleta.php";

validarEnvioFormulario($paginaVolta);

$modelo = lerCampo("modelo");
$marca = lerCampo("marca");
$preco = lerCampo("preco");

$erro = validarBicicleta($modelo, $marca, $preco);

if ($erro == "") {
    $erro = validarImagem($_FILES['imagem'] ?? null);
}

if ($erro != "") {
    voltarComErro($erro, $paginaVolta);
}

$nomeImagem = salvarImagem($_FILES['imagem']);

cadastrarBicicleta($conexao, $modelo, $marca, $preco, $nomeImagem);

header("Location: ../views/listar.php");
exit;
