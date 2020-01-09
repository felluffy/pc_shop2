<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use App\Interfaces\AnnouncementInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\AttributeInterface;
use App\Interfaces\BrandInterface;
use App\Interfaces\ProductInterface;

class DashboardController extends BaseController
{
    protected $userRepository, $announcementRepository, $categoryRepository, $attributeRepository, $brandRepository, $productRepository;
    public function __construct(UserInterface $userRepository, AnnouncementInterface $announcementRepository, CategoryInterface $categoryRepository, AttributeInterface $attributeRepository, BrandInterface $brandRepository, ProductInterface $productRepository)
    {
        $this->userRepository = $userRepository;
        $this->announcementRepository = $announcementRepository;
        $this->categoryRepository = $categoryRepository;
        $this->attributeRepository = $attributeRepository;
        $this->brandRepository = $brandRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
