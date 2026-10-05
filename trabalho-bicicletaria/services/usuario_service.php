<?php
function validarUsuario($nome, $email, $senha) {
    if ($nome == "" || mb_strlen($nome) > 80) {
        return "O nome é obrigatório e pode ter no máximo 80 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 255) {
        return "Informe um e-mail válido.";
    }

    if (mb_strlen($senha) < 6) {
        return "A senha precisa ter pelo menos 6 caracteres.";
    }

    return "";
}

function buscarUsuarioPorEmail($conexao, $email) {
    $consulta = mysqli_prepare($conexao, "SELECT id, nome, senha, email, foto FROM usuarios WHERE email = ?");
    mysqli_stmt_bind_param($consulta, "s", $email);
    mysqli_stmt_execute($consulta);

    return mysqli_fetch_assoc(mysqli_stmt_get_result($consulta));
}

function cadastrarUsuario($conexao, $nome, $email, $senha, $nomeFoto) {
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $consulta = mysqli_prepare($conexao, "INSERT INTO usuarios (nome, senha, email, foto) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($consulta, "ssss", $nome, $senhaCriptografada, $email, $nomeFoto);
    mysqli_stmt_execute($consulta);
}

function verificarLogin($conexao, $email, $senha) {
    $usuario = buscarUsuarioPorEmail($conexao, $email);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        return $usuario;
    }

    return null;
}
