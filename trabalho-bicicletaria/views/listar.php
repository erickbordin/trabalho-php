<?php
session_start();
include "../includes/validacao.php";

$tituloPagina = "Bicicletas";
include "../includes/head.php";
include "../includes/topo.php";
?>

<div class="conteudo">
    <h1>Bicicletas à venda</h1>

    <?php include "../includes/mensagem.php"; ?>

    <input type="hidden" id="token" value="<?php echo gerarTokenFormulario(); ?>">

    <div id="aviso"></div>

    <div id="bicicletas"></div>
</div>

<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript">
    lista();

    setInterval("lista()", 60000);
</script>

<?php include "../includes/rodape.php"; ?>
