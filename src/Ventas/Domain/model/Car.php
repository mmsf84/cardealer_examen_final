<?php
namespace Ventas\Domain\model;

class BankAccount
{    
    protected $placa;
    protected $marca;
    protected $modelo;
    protected $anho;

    public function __construct($placa, $marca, $modelo, $anho)
    {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anho = $anho;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getAnho()
    {
        return $this->anho;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setAnho($anho)
    {
        $this->anho = $anho;
    }

        
    
}
    