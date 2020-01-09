<?php

namespace App\Interfaces;

interface BrandInterface
{
    public function createBrand(array $params);
    public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    public function findBrandById(int $id);
    public function updateBrand(array $params);
    public function deleteBrand($id);
}