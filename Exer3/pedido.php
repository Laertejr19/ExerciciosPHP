<?php
class Pedido {
    private $produto;
    private $quantidade;
    private $precoUnitario;
    private $tipoCliente;

    public function __construct($produto, $quantidade, $precoUnitario, $tipoCliente){
        $this->produto = $produto;
        $this->quantidade = (int)$quantidade;
        $this->precoUnitario = (float)$precoUnitario;
        $this->tipoCliente = $tipoCliente;
    }

    public function totalBruto(){
        return $this->quantidade * $this->precoUnitario;
    }

    public function desconto(){
        if (strtolower($this->tipoCliente) === 'premium') return $this->totalBruto() * 0.10;
        return 0.0;
    }

    public function imposto(){
        return ($this->totalBruto() - $this->desconto()) * 0.08;
    }

    public function totalFinal(){
        return $this->totalBruto() - $this->desconto() + $this->imposto();
    }

    public function resumo(){
        return [
            'produto'=>$this->produto,
            'total_bruto'=>$this->totalBruto(),
            'desconto'=>$this->desconto(),
            'imposto'=>$this->imposto(),
            'total_final'=>$this->totalFinal()
        ];
    }
}
?>