<?php

use Rebuy\UrlShortener\Domain\Url;
use Rebuy\UrlShortener\Factory;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/make-it-short', function ($request, $response, $args) {
    return (new PhpRenderer(__DIR__ . '/../templates'))->render($response, 'form.php');
});

$app->post('/make-it-short', function ($request, $response, $args) {
    $renderer = new PhpRenderer(__DIR__ . '/../templates');
    $data = $request->getParsedBody();
    $longUrl = $data['url'];

    try {
        $httpResponse = (new Factory())->createApiClient()->query(new Url($longUrl), 'api/v1/link/shorten');

        if (!$httpResponse->isSuccess()) {
            return $renderer->render($response, 'exception.php', ['e' => $httpResponse->getBody()]);
        }

        return $renderer->render($response, 'result.php', ['url' => $httpResponse->getBody()]);
    } catch (Exception $e) {
        return $renderer->render($response, 'exception.php', ['e' => $e->getMessage()]);
    }
});

$app->run();
