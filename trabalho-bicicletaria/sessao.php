<?php
session_start();

// Só quem está logado pode abrir as páginas que incluem este arquivo.
// Se não estiver logado, volta para a página de cadastro.
if (!isset($_SESSION['usuario_id'])) {
    header("Location: cadastro_usuario.php?logado=0");
    exit;
}
?>
