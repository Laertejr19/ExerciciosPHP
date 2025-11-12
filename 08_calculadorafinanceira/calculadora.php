<?php
class CalculadoraFinanceira {
    private $valor;
    private $parcelas;
    private $taxaMensal;

    public function __construct($valor, $parcelas, $taxaMensal){
        $this->valor = (float)$valor;
        $this->parcelas = (int)$parcelas;
        $this->taxaMensal = (float)$taxaMensal;
    }

    public function valorParcela(){
        $total = $this->valor * pow(1 + $this->taxaMensal, $this->parcelas);
        return $total / $this->parcelas;
    }

    public function totalAPagar(){
        return $this->valor * pow(1 + $this->taxaMensal, $this->parcelas);
    }

    public function jurosPagos(){
        return $this->totalAPagar() - $this->valor;
    }

    public function resumo(){
        return [
            'parcela' => $this->valorParcela(),
            'total' => $this->totalAPagar(),
            'juros' => $this->jurosPagos()
        ];
    }
}
?>