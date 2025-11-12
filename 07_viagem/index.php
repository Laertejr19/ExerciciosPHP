<?php
require_once "viagem.php";
$res = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $v = new Viagem($_POST['origem'], $_POST['destino'], $_POST['distancia'], $_POST['tempo'], $_POST['consumo']);
    $res = $v->resumo((float)$_POST['preco_comb']);
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 07 - Viagem</title></head>
<body>
<h2>Planejamento de Viagem</h2>
<form method="post">
    Origem:<br><input name="origem" required><br>
    Destino:<br><input name="destino" required><br>
    Distância (km):<br><input name="distancia" type="number" step="0.1" required><br>
    Tempo estimado (h):<br><input name="tempo" type="number" step="0.1" required><br>
    Consumo veículo (km/l):<br><input name="consumo" type="number" step="0.1" required><br>
    Preço do combustível (R$/L):<br><input name="preco_comb" type="number" step="0.01" required><br><br>
    <button>Calcular</button>
</form>

<?php if ($res): ?>
    <h3>Resultado</h3>
    <p>Origem → Destino: <?=htmlspecialchars($res['origem'])?> → <?=htmlspecialchars($res['destino'])?></p>
    <p>Velocidade média: <?=number_format($res['vel_media'],2,',','.')?> km/h</p>
    <p>Consumo estimado: <?=number_format($res['consumo_estimado'],2,',','.')?> L</p>
    <p>Custo estimado: R$ <?=number_format($res['custo'],2,',','.')?></p>
<?php endif; ?>
</body>
</html>