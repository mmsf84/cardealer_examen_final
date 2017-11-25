<?php
// DIC configuration

use Ventas\Application\CarConsultApplicationService;
use Ventas\Domain\services\CarConsultDomainService;
use Ventas\Infrastructure\repository\fake\CarFakeRepository;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};


// -----------------------------------------------------------------------------
// Infrastructure Repository Fake
// -----------------------------------------------------------------------------
$container['car_fake_repository'] = function ($c) {
    return new CarFakeRepository();
};

// -----------------------------------------------------------------------------
// Domain Services
// -----------------------------------------------------------------------------
$container['consulta_domain_service'] = function ($c) {    
    $domainService = new CarConsultDomainService();
    $domainService->setCarRepository($c->get('car_fake_repository'));
    return $domainService;
};

// -----------------------------------------------------------------------------
// Application Services
// -----------------------------------------------------------------------------
$container['consulta_application_service'] = function ($c) {
    return new CarConsultApplicationService($c->get('consult_domain_service'));
};

