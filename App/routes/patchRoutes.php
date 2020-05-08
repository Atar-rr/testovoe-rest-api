<?php

use App\model\User;

$app->patch('/api/users/{id}', function ($request, $response, $argv) {
    $id = $argv['id'];
    $name = $request->getParsedBodyParam('name');
    $users = new User();

    if (!empty($name)) {
        $data = $users->connectDb();
        if ($data) {
            if ($users->updateUser($data, $id, $name)) {
                return $response->withStatus(200)
                    ->withHeader("Content-Type", "application/json")
                    ->write(json_encode(["message" => 'User update']));
            }
        }
        return $response->withStatus(404)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(["message" => 'User not found']));
    }
    return $response->withStatus(400)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode(["message" => 'Wrong data']));
});
