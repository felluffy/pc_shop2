<?php

namespace App\Interfaces;

interface AttributeInterface
{
    public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findAttributeById(int $id);
    public function createAttribute(array $params);
    public function deleteAttribute($id);
    public function updateAttribute(array $params);

}