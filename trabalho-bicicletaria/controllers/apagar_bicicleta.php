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

apagarBicicleta($conexao, $id);
apagarImagem($bicicleta['imagem']);

header("Location: ../views/listar.php");
exit;
