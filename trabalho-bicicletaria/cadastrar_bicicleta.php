<?php
include "sessao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar bicicleta</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="topo">
    <a href="cadastro_usuario.php">Cadastrar Usuario</a>
    <a href="listar.php">Bicicletas</a>
    <a href="cadastrar_bicicleta.php">Cadastrar bicicleta</a>
    <a href="login.php">Entrar</a>

    <?php if (isset($_SESSION['usuario_nome'])) { ?>
        <span class="logado">Logado: <?php echo $_SESSION['usuario_nome']; ?></span>
    <?php } else { ?>
        <span class="deslogado">Você não está logado</span>
    <?php } ?>
</div>

<div class="conteudo">
    <h1>Cadastrar bicicleta</h1>
    <form action="salvar_bicicleta.php" method="POST" enctype="multipart/form-data">
        <label>Modelo</label>
        <input type="text" name="modelo" maxlength="100" required>

        <label>Marca</label>
        <input type="text" name="marca" maxlength="60" required>

        <label>Preço</label>
        <input type="number" name="preco" step="0.01" required>

        <label>Foto</label>
        <input type="file" name="imagem" required>

        <button type="submit">Salvar</button>
    </form>
</div>

</body>
</html>
