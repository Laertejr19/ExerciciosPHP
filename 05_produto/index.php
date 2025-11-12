<?php
require_once "produto.php";
session_start();
if (!isset($_SESSION['produto'])) {
    $_SESSION['produto'] = serialize(new Produto('Exemplo', 10, 5.00));
}
$produto = unserialize($_SESSION['produto']);
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_POST['entrada'])) {
            $produto->entrada((int)$_POST['qtd']);
            $msg = "Entrada realizada.";
        } elseif (isset($_POST['saida'])) {
            $produto->saida((int)$_POST['qtd']);
            $msg = "Saída realizada.";
        } elseif (isset($_POST['alterar'])) {
            $produto = new Produto($_POST['nome'], (int)$_POST['qtd_inicial'], (float)$_POST['valor']);
            $msg = "Produto alterado.";
        }
    } catch (Exception $e) {
        $msg = $e->getMessage();
    }
    $_SESSION['produto'] = serialize($produto);
}
$estado = $produto->estado();
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 05 - Produto</title></head>
<body>
<h2>Controle de Estoque</h2>
<p><?=htmlspecialchars($msg)?></p>

<h3>Produto atual</h3>
<p>Nome: <?=htmlspecialchars($estado['nome'])?></p>
<p>Qtd: <?=$estado['quantidade']?></p>
<p>Valor unitário: R$ <?=number_format($estado['valor_unitario'],2,',','.')?></p>
<p>Valor total em estoque: R$ <?=number_format($estado['valor_total'],2,',','.')?></p>

<hr>
<h3>Movimentar</h3>
<form method="post">
    Quantidade:<br><input name="qtd" type="number" value="1" required><br>
    <button name="entrada">Registrar Entrada</button>
    <button name="saida">Registrar Saída</button>
</form>

<hr>
<h3>Alterar produto</h3>
<form method="post">
    Nome:<br><input name="nome" value="<?=htmlspecialchars($estado['nome'])?>" required><br>
    Quantidade inicial:<br><input name="qtd_inicial" type="number" value="<?=$estado['quantidade']?>" required><br>
    Valor unitário:<br><input name="valor" type="number" step="0.01" value="<?=$estado['valor_unitario']?>"><br><br>
    <button name="alterar">Salvar</button>
</form>
</body>
</html>