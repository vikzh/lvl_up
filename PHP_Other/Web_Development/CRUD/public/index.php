<?php

namespace App;

require '/composer/vendor/autoload.php';

use function Stringy\create as s;

$repo = new Repository();

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($configuration);

$container = $app->getContainer();
$container['renderer'] = new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

$app->get('/', function ($request, $response) {
    return $this->renderer->render($response, 'index.phtml');
});

$app->get('/posts', function ($request, $response) use ($repo) {
    $flash = $this->flash->getMessages();

    $params = [
        'flash' => $flash,
        'posts' => $repo->all()
    ];
    return $this->renderer->render($response, 'posts/index.phtml', $params);
})->setName('posts');

$app->get('/posts/new', function ($request, $response) use ($repo) {
    $params = [
        'postData' => [],
        'errors' => []
    ];
    return $this->renderer->render($response, 'posts/new.phtml', $params);
});

$app->post('/posts', function ($request, $response) use ($repo) {
    $postData = $request->getParsedBodyParam('post');

    $validator = new Validator();
    $errors = $validator->validate($postData);

    if (count($errors) === 0) {
        $repo->save($postData);
        $this->flash->addMessage('success', 'Post has been created');
        return $response->withRedirect($this->router->pathFor('posts'));
    }

    $params = [
        'postData' => $postData,
        'errors' => $errors
    ];

    return $this->renderer->render($response, 'posts/new.phtml', $params);
});

$app->get('/posts/{id}/edit', function ($request, $response, array $args) use ($repo) {
    $post = $repo->find($args['id']);
    $params = [
        'post' => $post,
        'postData' => $post
    ];
    return $this->renderer->render($response, 'posts/edit.phtml', $params);
});

$app->patch('/posts/{id}', function ($request, $response, array $args) use ($repo) {
    $post = $repo->find($args['id']);
    $postData = $request->getParsedBodyParam('post');

    $validator = new Validator();
    $errors = $validator->validate($postData);

    if (count($errors) === 0) {
        $post['name'] = $postData['name'];
        $post['body'] = $postData['body'];
        $repo->save($post);
        $this->flash->addMessage('success', 'Post has been updated');
        return $response->withRedirect($this->router->pathFor('posts'));
    }

    $params = [
        'post' => $post,
        'postData' => $postData,
        'errors' => $errors
    ];

    return $this->renderer->render($response, 'posts/edit.phtml', $params);
});

$app->delete('/posts/{id}', function ($request, $response, array $args) use ($repo) {
    $repo->destroy($args['id']);
    $this->flash->addMessage('success', 'Post has been deleted');
    return $response->withRedirect($this->router->pathFor('posts'));
});

$app->run();
