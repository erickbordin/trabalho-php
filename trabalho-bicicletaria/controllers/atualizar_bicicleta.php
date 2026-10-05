<?php
include "../includes/sessao.php";
include "../includes/validacao.php";
include "../config/conexao.php";
include "../services/bicicleta_service.php";
include "../services/upload_service.php";

validarEnvioFormulario("../views/listar.php");

$id = (int) lerCampo("id");
$bicicleta = buscarBicicletaPorId($conexao, $id);

if (!$bicicleta) {
    voltarComErro("Bicicleta não encontrada.", "../views/listar.php");
}

$paginaVolta = "../views/editar_bicicleta.php?id=" . $id;

$modelo = lerCampo("modelo");
$marca = lerCampo("marca");
$preco = lerCampo("preco");

$erro = validarBicicleta($modelo, $marca, $preco);

$enviouImagemNova = isset($_FILES['imagem']['error']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE;

if ($erro == "" && $enviouImagemNova) {
    $erro = validarImagem($_FILES['imagem']);
}

if ($erro != "") {
    voltarComErro($erro, $paginaVolta);
}

$nomeImagem = $bicicleta['imagem'];

if ($enviouImagemNova) {
    $nomeImagem = salvarImagem($_FILES['imagem']);
    apagarImagem($bicicleta['imagem']);
}

editarBicicleta($conexao, $id, $modelo, $marca, $preco, $nomeImagem);

header("Location: ../views/listar.php");
exit;
