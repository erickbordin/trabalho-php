<?php
session_start();

// Só quem está logado pode abrir as páginas que incluem este arquivo.
// Se não estiver logado, vai para a tela de login.
if (!isset($_SESSION['usuario_nome'])) {
    header("Location: login.php?logado=0");
    exit;
}
?>
