<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Entrar</title>
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
    <h1>Entrar</h1>

    <?php if (isset($_GET['cadastrado'])) { ?>
        <p class="sucesso">Cadastro realizado! Agora faça o login.</p>
    <?php } ?>

    <?php if (isset($_GET['erro'])) { ?>
        <p class="erro">E-mail ou senha incorretos.</p>
    <?php } ?>

    <form action="valida_login.php" method="POST">
        <label>E-mail</label>
        <input type="email" name="email" required>

        <label>Senha</label>
        <input type="password" name="senha" required>

        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>
