<?php
require_once "pessoa.php";
$res = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $p = new Pessoa($_POST['nome'], $_POST['peso'], $_POST['altura']);
    $res = $p->resumo();
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 09 - IMC</title></head>
<body>
<h2>Calculadora de IMC</h2>
<form method="post">
    Nome:<br><input name="nome" required><br>
    Peso (kg):<br><input name="peso" type="number" step="0.1" required><br>
    Altura (m):<br><input name="altura" type="number" step="0.01" required><br><br>
    <button>Calcular</button>
</form>

<?php if ($res): ?>
    <h3>Resultado</h3>
    <p>Nome: <?=htmlspecialchars($res['nome'])?></p>
    <p>IMC: <?=number_format($res['imc'],2,',','.')?></p>
    <p>Classificação: <?=htmlspecialchars($res['classificacao'])?></p>
<?php endif; ?>
</body>
</html>