<?php
require_once "funcionario.php";
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $f = new Funcionario($_POST['nome'], $_POST['cargo'], $_POST['salario'], $_POST['carga']);
    $result = $f->exibirDetalhes((float)$_POST['bonus'], (int)$_POST['extras']);
}
?>
<!doctype html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Exercício 01 - Funcionário</title></head>
<body>
<h2>Cadastro de Funcionário</h2>
<form method="post">
    Nome:<br><input name="nome" required><br>
    Cargo:<br><input name="cargo" required><br>
    Salário:<br><input name="salario" type="number" step="0.01" required><br>
    Carga Horária Semanal:<br><input name="carga" type="number" required><br>
    Bônus:<br><input name="bonus" type="number" step="0.01" value="0"><br>
    Horas Extras:<br><input name="extras" type="number" value="0"><br><br>
    <button type="submit">Calcular</button>
</form>

<?php if ($result): ?>
    <h3>Resultado</h3>
    <p><?= htmlspecialchars($result['resumo']) ?></p>
    <p>Salário base: R$ <?= number_format($result['salario_base'],2,',','.') ?></p>
    <p>Valor hora: R$ <?= number_format($result['valor_hora'],2,',','.') ?></p>
    <p>Horas extras: R$ <?= number_format($result['hora_extra'],2,',','.') ?></p>
    <p>Bônus: R$ <?= number_format($result['bonus'],2,',','.') ?></p>
    <p><strong>Salário final: R$ <?= number_format($result['salario_final'],2,',','.') ?></strong></p>
<?php endif; ?>
</body>
</html>