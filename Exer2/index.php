<?php
require_once "aluno.php";
$res = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notas = [$_POST['n1'], $_POST['n2'], $_POST['n3']];
    $a = new Aluno($_POST['nome'], $_POST['disciplina'], $notas);
    $res = $a->resumo();
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 02 - Aluno</title></head>
<body>
<h2>Aluno - Média e Status</h2>
<form method="post">
    Nome:<br><input name="nome" required><br>
    Disciplina:<br><input name="disciplina" required><br>
    Nota 1:<br><input name="n1" type="number" step="0.01" required><br>
    Nota 2:<br><input name="n2" type="number" step="0.01" required><br>
    Nota 3:<br><input name="n3" type="number" step="0.01" required><br><br>
    <button>Calcular</button>
</form>

<?php if ($res): ?>
    <h3>Resultado</h3>
    <p>Nome: <?=htmlspecialchars($res['nome'])?></p>
    <p>Disciplina: <?=htmlspecialchars($res['disciplina'])?></p>
    <p>Notas: <?=implode(' | ', array_map(function($n){ return number_format($n,2,',','.'); }, $res['notas']))?></p>
    <p>Média: <?=number_format($res['media'],2,',','.')?></p>
    <p>Status: <strong><?= $res['status'] ?></strong></p>
<?php endif; ?>
</body>
</html>