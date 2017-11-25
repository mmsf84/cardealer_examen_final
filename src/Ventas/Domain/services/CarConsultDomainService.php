<?php
namespace Ventas\Domain\services;

use Ventas\Domain\model\Car;
use Ventas\Domain\repository\BankAccountRepository;

class CarConsultDomainService {
    
    private $carRepository;
	
	public function __construct()
    {
		
    }
	
    public function setCarRepository($carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function consultCarFake($placa)
    {

        $carsBdFake = array();
        $carsBdFake = $this->carRepository->getFakeBdCars();
        foreach ($carsBdFake as $car) {
            if($car->getPlaca() == $placa){
                return $car;
            }
        }

        return null;
        
    }

}