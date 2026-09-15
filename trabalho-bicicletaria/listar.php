<?php
include "conexao.php";

$resultado = mysqli_query($conexao, "SELECT * FROM bicicletas ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bicicletas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="topo">
    <a href="cadastro_usuario.php">Cadastrar Usuario</a>
    <a href="listar.php">Bicicletas</a>
    <a href="cadastrar_bicicleta.php">Cadastrar bicicleta</a>
    <a href="login.php">Entrar</a>
</div>

<div class="conteudo">
    <h1>Bicicletas à venda</h1>

    <?php while ($bicicleta = mysqli_fetch_assoc($resultado)) { ?>
        <div class="card">
            <img src="imagem/<?php echo $bicicleta['imagem']; ?>" alt="">
            <h2><?php echo $bicicleta['modelo']; ?></h2>
            <p><?php echo $bicicleta['marca']; ?></p>
            <p class="preco">R$ <?php echo number_format($bicicleta['preco'], 2, ",", "."); ?></p>
        </div>
    <?php } ?>
</div>

</body>
</html>
