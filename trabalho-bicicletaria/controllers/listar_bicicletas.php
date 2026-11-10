<?php
session_start();
include "../config/conexao.php";
include "../services/bicicleta_service.php";

$bicicletas = listarBicicletas($conexao);

foreach ($bicicletas as $bicicleta) {
    echo "<div class='card'>";
    echo "<img src='../uploads/" . htmlspecialchars($bicicleta['imagem']) . "' alt=''>";
    echo "<h2>" . htmlspecialchars($bicicleta['modelo']) . "</h2>";
    echo "<p>" . htmlspecialchars($bicicleta['marca']) . "</p>";
    echo "<p class='preco'>R$ " . number_format($bicicleta['preco'], 2, ",", ".") . "</p>";

    if (isset($_SESSION['usuario_nome'])) {
        echo "<div class='acoes'>";
        echo "<a href='editar_bicicleta.php?id=" . $bicicleta['id'] . "' class='editar'>Editar</a>";
        echo "<button class='apagar' onclick='apaga(" . $bicicleta['id'] . ");'>Apagar</button>";
        echo "</div>";
    }

    echo "</div>";
}
