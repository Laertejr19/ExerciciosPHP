<?php
class Funcionario {
    private $nome;
    private $cargo;
    private $salario;
    private $cargaHoraria; 

    public function __construct($nome, $cargo, $salario, $cargaHoraria){
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = (float)$salario;
        $this->cargaHoraria = (int)$cargaHoraria;
    }

    public function getResumo(){
        return "Funcionário: {$this->nome} - Cargo: {$this->cargo}";
    }

    public function calcularValorHora(){
        $horasMes = $this->cargaHoraria * 4;
        return $horasMes > 0 ? $this->salario / $horasMes : 0;
    }

    public function calcularHoraExtra(int $horasExtras){
        return $this->calcularValorHora() * 1.5 * $horasExtras;
    }

    public function calcularSalarioComBonus(float $bonus){
        return $this->salario + $bonus;
    }

    public function exibirDetalhes(float $bonus, int $horasExtras){
        $salarioFinal = $this->salario + $this->calcularHoraExtra($horasExtras) + $bonus;
        return [
            'resumo' => $this->getResumo(),
            'salario_base' => $this->salario,
            'valor_hora' => $this->calcularValorHora(),
            'hora_extra' => $this->calcularHoraExtra($horasExtras),
            'bonus' => $bonus,
            'salario_final' => $salarioFinal
        ];
    }
}
?>