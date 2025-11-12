<?php
class Viagem {
    private $origem;
    private $destino;
    private $distanciaKm;
    private $tempoHoras;
    private $consumoKmL;

    public function __construct($origem, $destino, $distanciaKm, $tempoHoras, $consumoKmL){
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distanciaKm = (float)$distanciaKm;
        $this->tempoHoras = (float)$tempoHoras;
        $this->consumoKmL = (float)$consumoKmL;
    }

    public function velocidadeMedia(){
        return $this->tempoHoras > 0 ? $this->distanciaKm / $this->tempoHoras : 0;
    }

    public function consumoEstimado(){
        return $this->consumoKmL > 0 ? $this->distanciaKm / $this->consumoKmL : 0;
    }

    public function custoViagem($precoCombustivel){
        return $this->consumoEstimado() * (float)$precoCombustivel;
    }

    public function resumo($precoCombustivel){
        return [
            'origem'=>$this->origem,
            'destino'=>$this->destino,
            'vel_media'=>$this->velocidadeMedia(),
            'consumo_estimado'=>$this->consumoEstimado(),
            'custo'=>$this->custoViagem($precoCombustivel)
        ];
    }
}
?>