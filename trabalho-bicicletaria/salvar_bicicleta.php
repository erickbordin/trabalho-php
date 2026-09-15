<?php
include "sessao.php";
include "conexao.php";

$modelo = mysqli_real_escape_string($conexao, $_POST['modelo']);
$marca  = mysqli_real_escape_string($conexao, $_POST['marca']);
$preco  = mysqli_real_escape_string($conexao, $_POST['preco']);

$extensao   = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
$nomeImAgem = md5(date("YmdHis")) . "." . $extensao;

move_uploaded_file($_FILES['imagem']['tmp_name'], "imagem/" . $nomeImAgem);

mysqli_query($conexao, "INSERT INTO bicicletas (modelo, marca, preco, imagem)
                        VALUES ('$modelo', '$marca', '$preco', '$nomeImAgem')");

header("Location: listar.php");
?>
