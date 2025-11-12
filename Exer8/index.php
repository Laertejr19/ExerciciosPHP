<?php
require_once "calculadora.php";
$res = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $c = new CalculadoraFinanceira($_POST['valor'], $_POST['parcelas'], $_POST['taxa']/100);
    $res = $c->resumo();
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 08 - Calculadora Financeira</title></head>
<body>
<h2>Parcelamento com Juros Compostos</h2>
<form method="post">
    Valor da compra (R$):<br><input name="valor" type="number" step="0.01" required><br>
    Número de parcelas:<br><input name="parcelas" type="number" value="1" required><br>
    Taxa mensal (%):<br><input name="taxa" type="number" step="0.01" value="0"><br><br>
    <button>Calcular</button>
</form>

<?php if ($res): ?>
    <h3>Resultado</h3>
    <p>Parcela: R$ <?=number_format($res['parcela'],2,',','.')?></p>
    <p>Total a pagar: R$ <?=number_format($res['total'],2,',','.')?></p>
    <p>Juros pagos: R$ <?=number_format($res['juros'],2,',','.')?></p>
<?php endif; ?>
</body>
</html>