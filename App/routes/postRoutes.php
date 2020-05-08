<?php

use App\model\User;

$app->post('/api/users/new', function ($request, $response) {
    $name = $request->getParsedBodyParam('name');
    $users = new User();

    if (!empty($name)) {
        $data = $users->connectDb();
        $users->addUser($data, $name);

        return $response->withStatus(201)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(['message' => 'User was created']));
    }

    return $response->withStatus(400)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode(["message" => 'Cannot be created. Incomplete data']));
});
