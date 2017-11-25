<?php
namespace Ventas\Infrastructure\repository\fake;

use Ventas\Domain\repository\CarRepository;
use Ventas\Domain\model\Car;

class CarFakeRepository implements CarRepository
{
    public function __construct()
    {
    }
    
    public function getFakeBdCars()
    {
        $carros = array();
        $car[] = new Car("PG-8088", "Chevrolet", "3100", 1957);
        $car[] = new Car("BA-9898", "Ford", "Mustang", 1967);
        $car[] = new Car("AK-5850", "VW", "Karmann Ghia", 1963);
        $car[] = new Car("C4V-28", "Pontiac", "Firebird", 1967);
        return $carros;
    }

}