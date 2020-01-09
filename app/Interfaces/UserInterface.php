<?php

namespace App\Interfaces;

interface UserInterface
{
    public function listUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    public function findUserById(int $id);
    public function createUser(array $params);
    public function updateUser(array $params);
    public function deleteUser($id);
}