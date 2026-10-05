<?php
session_start();

if (!isset($_SESSION['usuario_nome'])) {
    header("Location: ../views/login.php?logado=0");
    exit;
}
