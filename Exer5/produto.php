<?php
class Produto {
    private $nome;
    private $quantidade;
    private $valorUnitario;

    public function __construct($nome, $quantidade, $valorUnitario){
        $this->nome = $nome;
        $this->quantidade = (int)$quantidade;
        $this->valorUnitario = (float)$valorUnitario;
    }

    public function entrada($qtd){
        $this->quantidade += (int)$qtd;
    }

    public function saida($qtd){
        $qtd = (int)$qtd;
        if ($qtd > $this->quantidade) {
            throw new Exception("Quantidade insuficiente em estoque.");
        }
        $this->quantidade -= $qtd;
    }

    public function valorTotalEstoque(){
        return $this->quantidade * $this->valorUnitario;
    }

    public function estado(){
        return [
            'nome'=>$this->nome,
            'quantidade'=>$this->quantidade,
            'valor_unitario'=>$this->valorUnitario,
            'valor_total'=>$this->valorTotalEstoque()
        ];
    }
}
?>