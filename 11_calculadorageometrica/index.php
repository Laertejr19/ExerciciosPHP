<?php
require_once "calculadora.php";
$res = null;
$tipo = $_POST['figura'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $calc = new CalculadoraGeometrica();
    try {
        if ($tipo === 'quadrado') {
            $res = $calc->calcular('quadrado',['lado'=>$_POST['lado']]);
        } elseif ($tipo === 'retangulo') {
            $res = $calc->calcular('retangulo',['base'=>$_POST['base'],'altura'=>$_POST['altura']]);
        } elseif ($tipo === 'circulo') {
            $res = $calc->calcular('circulo',['raio'=>$_POST['raio']]);
        }
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 11 - Geometria</title></head>
<body>
<h2>Calculadora Geométrica</h2>
<form method="post">
    Escolha figura:<br>
    <select name="figura" onchange="this.form.submit()">
        <option value="">--</option>
        <option value="quadrado" <?= $tipo==='quadrado'?'selected':''?>>Quadrado</option>
        <option value="retangulo" <?= $tipo==='retangulo'?'selected':''?>>Retângulo</option>
        <option value="circulo" <?= $tipo==='circulo'?'selected':''?>>Círculo</option>
    </select>
</form>

<form method="post">
    <input type="hidden" name="figura" value="<?=htmlspecialchars($tipo)?>">
    <?php if ($tipo === 'quadrado'): ?>
        Lado:<br><input name="lado" type="number" step="0.01" required><br>
    <?php elseif ($tipo === 'retangulo'): ?>
        Base:<br><input name="base" type="number" step="0.01" required><br>
        Altura:<br><input name="altura" type="number" step="0.01" required><br>
    <?php elseif ($tipo === 'circulo'): ?>
        Raio:<br><input name="raio" type="number" step="0.01" required><br>
    <?php else: ?>
        <p>Escolha uma figura acima e clique novamente.</p>
    <?php endif; ?>
    <?php if ($tipo): ?><br><button>Calcular Área</button><?php endif; ?>
</form>

<?php if (isset($erro)): ?><p style="color:red;"><?=htmlspecialchars($erro)?></p><?php endif; ?>
<?php if ($res): ?>
    <h3>Resultado</h3>
    <p>Figura: <?=htmlspecialchars($res['tipo'])?></p>
    <p>Área: <?=number_format($res['area'],2,',','.')?></p>
<?php endif; ?>
</body>
</html>