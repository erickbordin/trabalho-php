async function lista() {
    var url = "../controllers/listar_bicicletas.php";

    try {
        const response = await fetch(url);
        if (!response.ok) {
            document.getElementById('bicicletas').innerHTML = "houve um erro ao recuperar os dados: " + await response.statusText;
        }
        document.getElementById('bicicletas').innerHTML = await response.text();
    } catch (error) {
        document.getElementById('bicicletas').innerHTML = "houve um erro ao recuperar os dados: " + error;
    }
}

async function apaga(id) {
    var url = "../controllers/apagar_bicicleta.php";
    var token = document.getElementById("token").value;

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ 'id': id, 'token': token })
        });
        if (!response.ok) {
            document.getElementById('aviso').innerHTML = "houve um erro ao recuperar os dados: " + await response.statusText;
        }
        document.getElementById('aviso').innerHTML = await response.text();
        lista();
    } catch (error) {
        document.getElementById('aviso').innerHTML = "houve um erro ao recuperar os dados: " + error;
    }
}
