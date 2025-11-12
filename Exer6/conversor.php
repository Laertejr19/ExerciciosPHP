<?php
class ConversorMoeda {
    private $valorReais;

    public function __construct($valorReais){
        $this->valorReais = (float)$valorReais;
    }

    public function converter($moedaDestino, $cotacao){
        $cotacao = (float)$cotacao;
        if ($cotacao <= 0) throw new Exception("Cotação inválida.");
        $moeda = strtoupper($moedaDestino);
        $convertido = $this->valorReais / $cotacao;
        return [
            'moeda' => $moeda,
            'cotacao' => $cotacao,
            'valor_convertido' => $convertido
        ];
    }
}
?>