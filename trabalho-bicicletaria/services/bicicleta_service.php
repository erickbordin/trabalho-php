<?php
function validarBicicleta($modelo, $marca, $preco) {
    if ($modelo == "" || mb_strlen($modelo) > 100) {
        return "O modelo é obrigatório e pode ter no máximo 100 caracteres.";
    }

    if ($marca == "" || mb_strlen($marca) > 60) {
        return "A marca é obrigatória e pode ter no máximo 60 caracteres.";
    }

    if (!is_numeric($preco) || $preco <= 0 || $preco > 99999999.99) {
        return "Informe um preço maior que zero.";
    }

    return "";
}

function listarBicicletas($conexao) {
    $resultado = mysqli_query($conexao, "SELECT * FROM bicicletas ORDER BY id DESC");

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function buscarBicicletaPorId($conexao, $id) {
    $consulta = mysqli_prepare($conexao, "SELECT * FROM bicicletas WHERE id = ?");
    mysqli_stmt_bind_param($consulta, "i", $id);
    mysqli_stmt_execute($consulta);

    return mysqli_fetch_assoc(mysqli_stmt_get_result($consulta));
}

function cadastrarBicicleta($conexao, $modelo, $marca, $preco, $nomeImagem) {
    $consulta = mysqli_prepare($conexao, "INSERT INTO bicicletas (modelo, marca, preco, imagem) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($consulta, "ssss", $modelo, $marca, $preco, $nomeImagem);
    mysqli_stmt_execute($consulta);
}

function editarBicicleta($conexao, $id, $modelo, $marca, $preco, $nomeImagem) {
    $consulta = mysqli_prepare($conexao, "UPDATE bicicletas SET modelo = ?, marca = ?, preco = ?, imagem = ? WHERE id = ?");
    mysqli_stmt_bind_param($consulta, "ssssi", $modelo, $marca, $preco, $nomeImagem, $id);
    mysqli_stmt_execute($consulta);
}

function apagarBicicleta($conexao, $id) {
    $consulta = mysqli_prepare($conexao, "DELETE FROM bicicletas WHERE id = ?");
    mysqli_stmt_bind_param($consulta, "i", $id);
    mysqli_stmt_execute($consulta);
}
