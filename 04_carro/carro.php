<?php
class Carro {
    private $modelo;
    private $combustivel;
    private $tanqueLitros;
    private $consumo;
    private $kmRodados;

    public function __construct($modelo, $combustivel, $tanqueLitros, $consumo, $kmRodados=0){
        $this->modelo = $modelo;
        $this->combustivel = $combustivel;
        $this->tanqueLitros = (float)$tanqueLitros;
        $this->consumo = (float)$consumo;
        $this->kmRodados = (float)$kmRodados;
    }

    public function autonomia(){
        return $this->tanqueLitros * $this->consumo;
    }

    public function custoPorKm($precoCombustivel){
        $autonomia = $this->autonomia();
        if ($autonomia == 0) return 0;
        $custoTotal = $this->tanqueLitros * $precoCombustivel;
        return $custoTotal / $autonomia;
    }

    public function precisaRevisao($limiteKm = 10000){
        return $this->kmRodados >= $limiteKm;
    }

    public function resumo($precoCombustivel, $limiteRevisao = 10000){
        return [
            'modelo'=>$this->modelo,
            'autonomia_km'=>$this->autonomia(),
            'custo_por_km'=>$this->custoPorKm($precoCombustivel),
            'revisao'=> $this->precisaRevisao($limiteRevisao)
        ];
    }
}
?>