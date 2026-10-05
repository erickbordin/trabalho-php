<?php
session_start();
include "../includes/validacao.php";

$tituloPagina = "Criar conta";
include "../includes/head.php";
include "../includes/topo.php";
?>

<div class="conteudo">
    <h1>Criar conta</h1>

    <?php include "../includes/mensagem.php"; ?>

    <form action="../controllers/salvar_usuario.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?php echo gerarTokenFormulario(); ?>">

        <label>Nome</label>
        <input type="text" name="nome" maxlength="80" required>

        <label>E-mail</label>
        <input type="email" name="email" maxlength="255" required>

        <label>Senha</label>
        <input type="password" name="senha" minlength="6" required>

        <label>Foto</label>
        <input type="file" name="foto" accept=".jpg,.jpeg,.png,.gif,.webp" required>

        <button type="submit">Cadastrar</button>
    </form>
</div>

<?php include "../includes/rodape.php"; ?>
