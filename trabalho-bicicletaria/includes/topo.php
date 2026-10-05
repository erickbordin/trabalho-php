<div class="topo">
    <a href="listar.php">Bicicletas</a>

    <?php if (isset($_SESSION['usuario_nome'])) { ?>
        <a href="cadastrar_bicicleta.php">Cadastrar bicicleta</a>

        <span class="logado">
            <?php if (!empty($_SESSION['usuario_foto'])) { ?>
                <img src="../uploads/<?php echo htmlspecialchars($_SESSION['usuario_foto']); ?>" alt="" class="foto-usuario">
            <?php } ?>
            <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>
        </span>
        <a href="../controllers/logout.php" class="sair">Sair</a>
    <?php } else { ?>
        <a href="cadastro_usuario.php">Cadastrar Usuario</a>
        <a href="login.php">Entrar</a>

        <span class="deslogado">Você não está logado</span>
    <?php } ?>
</div>
