<?php
require_once "carro.php";
$res = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $c = new Carro($_POST['modelo'], $_POST['combustivel'], $_POST['tanque'], $_POST['consumo'], $_POST['km']);
    $res = $c->resumo((float)$_POST['preco_combustivel'], (int)$_POST['limite_revisao']);
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 04 - Carro</title></head>
<body>
<h2>Carro</h2>
<form method="post">
    Modelo:<br><input name="modelo" required><br>
    Combustível:<br>
    <select name="combustivel"><option value="gasolina">Gasolina</option><option value="etanol">Etanol</option></select><br>
    Tanque cheio (L):<br><input name="tanque" type="number" step="0.1" required><br>
    Consumo (km/L):<br><input name="consumo" type="number" step="0.1" required><br>
    KM rodados desde última revisão:<br><input name="km" type="number" value="0"><br>
    Preço do combustível (R$/L):<br><input name="preco_combustivel" type="number" step="0.01" value="0"><br>
    Limite revisão (km):<br><input name="limite_revisao" type="number" value="10000"><br><br>
    <button>Calcular</button>
</form>

<?php if ($res): ?>
    <h3>Resultado</h3>
    <p>Modelo: <?=htmlspecialchars($res['modelo'])?></p>
    <p>Autonomia: <?=number_format($res['autonomia_km'],2,',','.')?> km</p>
    <p>Custo por km: R$ <?=number_format($res['custo_por_km'],2,',','.')?></p>
    <p>Precisa revisão? <?= $res['revisao'] ? 'Sim' : 'Não' ?></p>
<?php endif; ?>
</body>
</html>