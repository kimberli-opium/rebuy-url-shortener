<?php
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
    $url = $data['url'];
    return $renderer->render($response, 'result.php', ['url' => $url]);
});

$app->run();
