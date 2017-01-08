<?php

class Resultado
{
    public $Resultado;
    public $Mensagem;
    public $Objeto;

    public function Resultado($resultado, $mensagem = "", $objeto = null)
    {
        $this -> Resultado = $resultado;
        $this -> Mensagem = $mensagem;
        $this -> Objeto = $objeto;
    }
}

?>