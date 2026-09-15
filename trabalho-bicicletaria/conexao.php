<?php
$conexao = mysqli_connect("localhost", "root", "", "bicicletaria");

if (!$conexao) {
    die("Erro ao conectar no banco: " . mysqli_connect_error());
}
?>
