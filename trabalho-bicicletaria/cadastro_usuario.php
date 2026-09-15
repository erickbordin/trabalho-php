<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar conta</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="topo">
    <a href="cadastro_usuario.php">Cadastrar Usuario</a>
    <a href="listar.php">Bicicletas</a>
    <a href="cadastrar_bicicleta.php">Cadastrar bicicleta</a>
    <a href="login.php">Entrar</a>
    <a href="logout.php">Sair</a>

    <?php if (isset($_SESSION['usuario_nome'])) { ?>
        <span class="logado">Logado: <?php echo $_SESSION['usuario_nome']; ?></span>
    <?php } else { ?>
        <span class="deslogado">Você não está logado</span>
    <?php } ?>
</div>

<div class="conteudo">
    <h1>Criar conta</h1>

    <?php if (isset($_GET['erro'])) { ?>
        <p class="erro">Este e-mail já está cadastrado.</p>
    <?php } ?>

    <form action="salvar_usuario.php" method="POST">
        <label>Nome</label>
        <input type="text" name="nome" maxlength="80" required>

        <label>E-mail</label>
        <input type="email" name="email" maxlength="255" required>

        <label>Senha</label>
        <input type="password" name="senha" required>

        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
