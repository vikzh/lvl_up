<?php

namespace App;

require '/composer/vendor/autoload.php';

use function Stringy\create as s;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

session_start();

$app = new \Slim\App($configuration);

$container = $app->getContainer();
$container['renderer'] = new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

$users = [
    ['name' => 'admin', 'passwordDigest' => hash('sha256', 'secret')],
    ['name' => 'mike', 'passwordDigest' => hash('sha256', 'superpass')],
    ['name' => 'kate', 'passwordDigest' => hash('sha256', 'strongpass')]
];

$app->get('/', function ($request, $response) {
    $flash = $this->flash->getMessages();
    $params = [
        'currentUser' => $_SESSION['user'] ?? null,
        'flash' => $flash
    ];
    return $this->renderer->render($response, 'index.phtml', $params);
});

$app->post('/session', function ($request, $response) use ($users) {
    $userData = $request->getParsedBodyParam('user');

    $user = collect($users)->first(function ($user) use ($userData) {
        return $user['name'] == $userData['name']
            && hash('sha256', $userData['password']) == $user['passwordDigest'];
    });

    if ($user) {
        $_SESSION['user'] = $user;
    } else {
        $this->flash->addMessage('error', 'Wrong password or name');
    }
    return $response->withRedirect('/');
});

$app->delete('/session', function ($request, $response) {
    $session = $request->getAttribute('session');
    session_unset();
    session_destroy();
    return $response->withRedirect('/');
});

$app->run();
