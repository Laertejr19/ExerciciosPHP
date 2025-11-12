<?php
class Aluno {
    private $nome;
    private $disciplina;
    private $notas;

    public function __construct($nome, $disciplina, array $notas){
        $this->nome = $nome;
        $this->disciplina = $disciplina;
        $this->notas = array_map('floatval', $notas);
    }

    public function calcularMedia(){
        return array_sum($this->notas) / count($this->notas);
    }

    public function obterStatus(){
        $media = $this->calcularMedia();
        if ($media >= 7) return 'Aprovado';
        if ($media >= 5) return 'Recuperação';
        return 'Reprovado';
    }

    public function resumo(){
        return [
            'nome' => $this->nome,
            'disciplina' => $this->disciplina,
            'notas' => $this->notas,
            'media' => $this->calcularMedia(),
            'status' => $this->obterStatus()
        ];
    }
}
?>