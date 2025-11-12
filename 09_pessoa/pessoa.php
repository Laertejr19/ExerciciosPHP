<?php
class Pessoa {
    private $nome;
    private $peso;
    private $altura;

    public function __construct($nome, $peso, $altura){
        $this->nome = $nome;
        $this->peso = (float)$peso;
        $this->altura = (float)$altura;
    }

    public function calcularIMC(){
        if ($this->altura <= 0) return 0;
        return $this->peso / ($this->altura * $this->altura);
    }

    public function classificar(){
        $imc = $this->calcularIMC();
        if ($imc < 18.5) return 'Abaixo do peso';
        if ($imc < 25) return 'Normal';
        if ($imc < 30) return 'Sobrepeso';
        return 'Obesidade';
    }

    public function resumo(){
        return [
            'nome'=>$this->nome,
            'imc'=>$this->calcularIMC(),
            'classificacao'=>$this->classificar()
        ];
    }
}
?>