<?php

use App\model\User;

$app->get('/api/users/show', function ($request, $response) {
    $users = new User();
    $data = $users->connectDb();
    if ($data) {
        return $response->withStatus(200)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data));
    }
    return $response->withStatus(404)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode(["message" => 'Users not found']));
});

$app->get('/api/users/{id}', function ($request, $response, $argv) {
    $id = $argv['id'];
    $users = new User();
    $data = $users->connectDb();
    if ($data) {
        $result = $users->getUser($data, $id);
        if (!empty($result)) {
            return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($result));
        }
    }
    return $response->withStatus(404)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode(["message" => 'User not found']));
});
