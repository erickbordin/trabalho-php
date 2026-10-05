<?php
session_start();
include "../includes/validacao.php";
include "../config/conexao.php";
include "../services/bicicleta_service.php";

$bicicletas = listarBicicletas($conexao);

$tituloPagina = "Bicicletas";
include "../includes/head.php";
include "../includes/topo.php";
?>

<div class="conteudo">
    <h1>Bicicletas à venda</h1>

    <?php include "../includes/mensagem.php"; ?>

    <?php foreach ($bicicletas as $bicicleta) { ?>
        <div class="card">
            <img src="../uploads/<?php echo htmlspecialchars($bicicleta['imagem']); ?>" alt="">
            <h2><?php echo htmlspecialchars($bicicleta['modelo']); ?></h2>
            <p><?php echo htmlspecialchars($bicicleta['marca']); ?></p>
            <p class="preco">R$ <?php echo number_format($bicicleta['preco'], 2, ",", "."); ?></p>

            <?php if (isset($_SESSION['usuario_nome'])) { ?>
                <div class="acoes">
                    <a href="editar_bicicleta.php?id=<?php echo $bicicleta['id']; ?>" class="editar">Editar</a>

                    <form action="../controllers/apagar_bicicleta.php" method="POST" onsubmit="return confirm('Apagar esta bicicleta?');">
                        <input type="hidden" name="token" value="<?php echo gerarTokenFormulario(); ?>">
                        <input type="hidden" name="id" value="<?php echo $bicicleta['id']; ?>">
                        <button type="submit" class="apagar">Apagar</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<?php include "../includes/rodape.php"; ?>
