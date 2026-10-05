<?php
include "../includes/sessao.php";
include "../includes/validacao.php";

$tituloPagina = "Cadastrar bicicleta";
include "../includes/head.php";
include "../includes/topo.php";
?>

<div class="conteudo">
    <h1>Cadastrar bicicleta</h1>

    <?php include "../includes/mensagem.php"; ?>

    <form action="../controllers/salvar_bicicleta.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?php echo gerarTokenFormulario(); ?>">

        <label>Modelo</label>
        <input type="text" name="modelo" maxlength="100" required>

        <label>Marca</label>
        <input type="text" name="marca" maxlength="60" required>

        <label>Preço</label>
        <input type="number" name="preco" step="0.01" min="0.01" max="99999999.99" required>

        <label>Foto</label>
        <input type="file" name="imagem" accept=".jpg,.jpeg,.png,.gif,.webp" required>

        <button type="submit">Salvar</button>
    </form>
</div>

<?php include "../includes/rodape.php"; ?>
