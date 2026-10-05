<?php
include "../includes/sessao.php";
include "../includes/validacao.php";
include "../config/conexao.php";
include "../services/bicicleta_service.php";

$bicicleta = buscarBicicletaPorId($conexao, (int) $_GET['id']);

if (!$bicicleta) {
    header("Location: listar.php");
    exit;
}

$tituloPagina = "Editar bicicleta";
include "../includes/head.php";
include "../includes/topo.php";
?>

<div class="conteudo">
    <h1>Editar bicicleta</h1>

    <?php include "../includes/mensagem.php"; ?>

    <form action="../controllers/atualizar_bicicleta.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?php echo gerarTokenFormulario(); ?>">
        <input type="hidden" name="id" value="<?php echo $bicicleta['id']; ?>">

        <label>Modelo</label>
        <input type="text" name="modelo" maxlength="100" value="<?php echo htmlspecialchars($bicicleta['modelo']); ?>" required>

        <label>Marca</label>
        <input type="text" name="marca" maxlength="60" value="<?php echo htmlspecialchars($bicicleta['marca']); ?>" required>

        <label>Preço</label>
        <input type="number" name="preco" step="0.01" min="0.01" max="99999999.99" value="<?php echo $bicicleta['preco']; ?>" required>

        <label>Foto atual</label>
        <img src="../uploads/<?php echo htmlspecialchars($bicicleta['imagem']); ?>" alt="" class="foto-atual">

        <label>Nova foto (deixe em branco para manter a atual)</label>
        <input type="file" name="imagem" accept=".jpg,.jpeg,.png,.gif,.webp">

        <button type="submit">Salvar alterações</button>
    </form>
</div>

<?php include "../includes/rodape.php"; ?>
