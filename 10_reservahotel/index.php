<?php
require_once "reserva.php";
$msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $r = new ReservaHotel($_POST['hospede'], $_POST['noites'], $_POST['quarto']);
    $msg = $r->mensagemBoasVindas();
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Exercício 10 - Reserva Hotel</title></head>
<body>
<h2>Reserva de Hotel</h2>
<form method="post">
    Nome do hóspede:<br><input name="hospede" required><br>
    Número de noites:<br><input name="noites" type="number" value="1" required><br>
    Tipo de quarto:<br>
    <select name="quarto">
        <option value="simples">Simples (R$120)</option>
        <option value="luxo">Luxo (R$200)</option>
        <option value="suíte">Suíte (R$350)</option>
    </select><br><br>
    <button>Calcular</button>
</form>

<?php if ($msg): ?><h3><?=htmlspecialchars($msg)?></h3><?php endif; ?>
</body>
</html>