<?php
class ReservaHotel {
    private $hospede;
    private $noites;
    private $tipoQuarto;

    public function __construct($hospede, $noites, $tipoQuarto){
        $this->hospede = $hospede;
        $this->noites = (int)$noites;
        $this->tipoQuarto = strtolower($tipoQuarto);
    }

    public function precoDiaria(){
        switch ($this->tipoQuarto) {
            case 'luxo': return 200.0;
            case 'suíte':
            case 'suite': return 350.0;
            default: return 120.0;
        }
    }

    public function total(){
        $total = $this->precoDiaria() * $this->noites;
        if ($this->noites > 5) $total *= 0.9;
        return $total;
    }

    public function mensagemBoasVindas(){
        return "Bem-vindo, {$this->hospede}! Total da estadia: R$ " . number_format($this->total(),2,',','.');
    }
}
?>