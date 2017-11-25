<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Ventas\application\dto\CarInfoResponseDto;


// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    $this->logger->info("Slim-Skeleton '/' route");
	return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/consultaPlaca/[{placa}]', function (Request $request, Response $response, array $args) {
    
    try {
        $carApplicationService = $app->getContainer()->get('car_application_service');
        if (empty($carApplicationService)) {
            throw new Exception("IoC returned null for carApplicationService");
        }
        $car = $carApplicationService->getCarByPlaca();        
        $carInfoResponseDto = new CarInfoResponseDto();
        $carInfoResponseDto->setInfo($car);        
        return $response->withJson($carInfoResponseDto, 200, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        $errorDto = getErrorDto($e);
        return $response->withJson($errorDto, 200, JSON_UNESCAPED_UNICODE);
    }
});

function getErrorDto(Exception $e)
{
    $errorDto = new \stdClass();
    $errorDto->error_message = $e->getMessage();
    return $errorDto;
}