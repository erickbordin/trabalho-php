<?php
session_start();
include "../config/conexao.php";
include "../services/bicicleta_service.php";
include "../services/upload_service.php";

$dados = json_decode(file_get_contents("php://input"));

if (!isset($_SESSION['usuario_nome'])) {
    echo "voce precisa estar logado para apagar uma bicicleta.";
    exit;
}

if (!isset($dados->token) || empty($_SESSION['token']) || !hash_equals($_SESSION['token'], $dados->token)) {
    echo "a pagina expirou. atualize a pagina e tente novamente.";
    exit;
}

$id = (int) $dados->id;
$bicicleta = buscarBicicletaPorId($conexao, $id);

if (!$bicicleta) {
    echo "bicicleta nao encontrada.";
    exit;
}

apagarBicicleta($conexao, $id);
apagarImagem($bicicleta['imagem']);

echo "a blicicleta foi apagada com sucesso.";
