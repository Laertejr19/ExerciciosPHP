<?php
class CalculadoraGeometrica {
    public function areaQuadrado($lado){
        return pow((float)$lado, 2);
    }
    public function areaRetangulo($base, $altura){
        return (float)$base * (float)$altura;
    }
    public function areaCirculo($raio){
        return pi() * pow((float)$raio, 2);
    }
    public function calcular($tipo, $medidas){
        switch (strtolower($tipo)) {
            case 'quadrado':
                return ['tipo'=>'Quadrado','area'=>$this->areaQuadrado($medidas['lado'])];
            case 'retangulo':
                return ['tipo'=>'Retângulo','area'=>$this->areaRetangulo($medidas['base'],$medidas['altura'])];
            case 'circulo':
            case 'círculo':
                return ['tipo'=>'Círculo','area'=>$this->areaCirculo($medidas['raio'])];
            default:
                throw new Exception("Tipo inválido");
        }
    }
}
?>