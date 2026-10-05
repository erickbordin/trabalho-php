<?php
session_start();
include "../includes/validacao.php";

$tituloPagina = "Entrar";
include "../includes/head.php";
include "../includes/topo.php";
?>

<div class="conteudo">
    <h1>Entrar</h1>

    <?php include "../includes/mensagem.php"; ?>

    <?php if (isset($_GET['logado'])) { ?>
        <p class="erro">Você precisa estar logado para acessar essa página.</p>
    <?php } ?>

    <?php if (isset($_GET['cadastrado'])) { ?>
        <p class="sucesso">Cadastro realizado! Agora faça o login.</p>
    <?php } ?>

    <?php if (isset($_GET['erro'])) { ?>
        <p class="erro">E-mail ou senha incorretos.</p>
    <?php } ?>

    <form action="../controllers/valida_login.php" method="POST">
        <input type="hidden" name="token" value="<?php echo gerarTokenFormulario(); ?>">

        <label>E-mail</label>
        <input type="email" name="email" required>

        <label>Senha</label>
        <input type="password" name="senha" required>

        <button type="submit">Entrar</button>
    </form>
</div>

<?php include "../includes/rodape.php"; ?>
