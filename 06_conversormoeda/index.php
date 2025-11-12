<?php
require_once "conversor.php";
$res = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conv = new ConversorMoeda((float)$_POST['reais']);
    try {
        $res = $conv->converter($_POST['moeda'], (float)$_POST['cotacao']);
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 06 - Conversor</title></head>
<body>
<h2>Conversor Real → USD/EUR</h2>
<form method="post">
    Valor em R$:<br><input name="reais" type="number" step="0.01" required><br>
    Moeda destino:<br>
    <select name="moeda"><option value="USD">USD</option><option value="EUR">EUR</option></select><br>
    Cotação (R$ por unidade):<br><input name="cotacao" type="number" step="0.0001" required><br><br>
    <button>Converter</button>
</form>

<?php if (isset($erro)): ?><p style="color:red;"><?=htmlspecialchars($erro)?></p><?php endif; ?>

<?php if ($res): ?>
    <h3>Resultado</h3>
    <p>Moeda: <?= $res['moeda'] ?></p>
    <p>Cotação: R$ <?= number_format($res['cotacao'],4,',','.') ?></p>
    <p>Valor convertido: <?= number_format($res['valor_convertido'],4,',','.') ?> <?= $res['moeda'] ?></p>
<?php endif; ?>
</body>
</html>