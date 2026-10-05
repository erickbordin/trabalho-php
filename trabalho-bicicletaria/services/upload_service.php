<?php
function validarImagem($arquivo) {
    if (!isset($arquivo['error']) || !is_int($arquivo['error']) || $arquivo['error'] == UPLOAD_ERR_NO_FILE) {
        return "Selecione uma imagem.";
    }

    if ($arquivo['error'] == UPLOAD_ERR_INI_SIZE || $arquivo['size'] > 2 * 1024 * 1024) {
        return "A imagem pode ter no máximo 2 MB.";
    }

    if ($arquivo['error'] != UPLOAD_ERR_OK) {
        return "Não foi possível enviar a imagem. Tente novamente.";
    }

    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

    if (!in_array($extensao, ["jpg", "jpeg", "png", "gif", "webp"])) {
        return "Envie uma imagem JPG, PNG, GIF ou WEBP.";
    }

    if ($arquivo['size'] == 0 || getimagesize($arquivo['tmp_name']) === false) {
        return "O arquivo enviado não é uma imagem.";
    }

    return "";
}

function salvarImagem($arquivo) {
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $nomeImagem = md5(uniqid()) . "." . $extensao;

    move_uploaded_file($arquivo['tmp_name'], "../uploads/" . $nomeImagem);

    return $nomeImagem;
}

function apagarImagem($nomeImagem) {
    if ($nomeImagem != "" && file_exists("../uploads/" . $nomeImagem)) {
        unlink("../uploads/" . $nomeImagem);
    }
}
