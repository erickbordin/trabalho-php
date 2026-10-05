<?php
function lerCampo($nomeCampo) {
    if (!isset($_POST[$nomeCampo]) || !is_string($_POST[$nomeCampo])) {
        return "";
    }

    return trim($_POST[$nomeCampo]);
}

function voltarComErro($mensagem, $paginaVolta) {
    $_SESSION['erro'] = $mensagem;
    header("Location: " . $paginaVolta);
    exit;
}

function gerarTokenFormulario() {
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['token'];
}

function validarEnvioFormulario($paginaVolta) {
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        header("Location: " . $paginaVolta);
        exit;
    }

    if (empty($_POST) && !empty($_SERVER['CONTENT_LENGTH'])) {
        voltarComErro("O arquivo enviado é grande demais.", $paginaVolta);
    }

    $token = lerCampo("token");

    if ($token == "" || empty($_SESSION['token']) || !hash_equals($_SESSION['token'], $token)) {
        voltarComErro("O formulário expirou. Tente novamente.", $paginaVolta);
    }
}
