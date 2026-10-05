<?php
$conexao = mysqli_connect("localhost", "root", "", "bicicletaria");

if (!$conexao) {
    die("deu erro ao se conectar no banco: " . mysqli_connect_error());
}
?>
