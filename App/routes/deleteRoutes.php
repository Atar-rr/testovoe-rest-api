<?php

use App\model\User;

$app->delete('/api/users/{id}', function ($request, $response, $argv) {
    $id = $argv['id'];
    $users = new User();
    $data = $users->connectDb();

    if ($data) {
        if ($users->deleteUser($data, $id)) {
            return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode(["message" => 'User delete']));
        }
    }

    return $response->withStatus(404)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode(["message" => 'User not found']));
});
