<?php

namespace App\model;

class User
{
    public function connectDb()
    {
        $users = [];

        if (file_exists(__DIR__ . '/../db/local_storage.json')) {
            $users = json_decode(file_get_contents(__DIR__ . '/../db/local_storage.json'), true);
        }

        return $users;
    }

    public function getUser($users, $id)
    {
        $result = array_filter($users, function ($user) use ($id) {
            if ($user['id'] === $id) {
                return $user;
            }
        });

        return $result;
    }

    public function addUser($users, $name)
    {
        $id = uniqid();
        $users [] = ['name' => $name, 'id' => $id];
        $json = json_encode($users, JSON_UNESCAPED_UNICODE);
        file_put_contents(__DIR__ . '/../db/local_storage.json', $json);
    }

    public function deleteUser($users, $id)
    {
        foreach ($users as $user) {
            if ($user['id'] === $id) {
                $result = array_filter($users, function ($user) use ($id) {
                    if ($user['id'] !== $id) {
                        return $user;
                    }
                });
                file_put_contents(__DIR__ . '/../db/local_storage.json', json_encode(array_values($result)));

                return true;
            }
        }
        return false;
    }

    public function updateUser($users, $id, $name)
    {
        foreach ($users as &$user) {
            if ($user['id'] === $id) {
                $user['name'] = $name;
                file_put_contents(__DIR__ . '/../db/local_storage.json', json_encode(array_values($users)));
                return true;
            }
        }
        return false;
    }
}
