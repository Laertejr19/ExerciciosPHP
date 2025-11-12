<?php
require_once "pedido.php";
$res = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $p = new Pedido($_POST['produto'], $_POST['quantidade'], $_POST['preco'], $_POST['cliente']);
    $res = $p->resumo();
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 03 - Pedido</title></head>
<body>
<h2>Pedido</h2>
<form method="post">
    Produto:<br><input name="produto" required><br>
    Quantidade:<br><input name="quantidade" type="number" value="1" required><br>
    Preço unitário:<br><input name="preco" type="number" step="0.01" required><br>
    Tipo de cliente:<br>
    <select name="cliente">
        <option value="normal">Normal</option>
        <option value="premium">Premium</option>
    </select><br><br>
    <button>Calcular</button>
</form>

<?php if ($res): ?>
    <h3>Resumo</h3>
    <p>Produto: <?=htmlspecialchars($res['produto'])?></p>
    <p>Total bruto: R$ <?=number_format($res['total_bruto'],2,',','.')?></p>
    <p>Desconto: R$ <?=number_format($res['desconto'],2,',','.')?></p>
    <p>Imposto (8%): R$ <?=number_format($res['imposto'],2,',','.')?></p>
    <p><strong>Total final: R$ <?=number_format($res['total_final'],2,',','.')?></strong></p>
<?php endif; ?>
</body>
</html>