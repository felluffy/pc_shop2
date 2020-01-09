<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\AnnouncementInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\CategoryInterface;

class HomepageController extends BaseController
{
    protected $announcementRepository;
    protected $categoryRepository;
    protected $productRepository;
    public function __construct(AnnouncementInterface $announcementRepository, CategoryInterface $categoryRepository, ProductInterface $productRepository)
    {
        $this->announcementRepository = $announcementRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $announcement = $this->announcementRepository->latestAnnouncement();
        $products = $this->productRepository->listFeaturedProducts();
        $categories = $this->categoryRepository->listFeaturedCategories();

        //dd($announcement, $products, $categories);
        return view('site.pages.homepage', compact(['announcement', 'products', 'categories']));
    }
    public function search(Request $request)
    {
        $products = $this->productRepository->findProductsByName($request->searchQuery);
        //dd($products, $request->searchQuery);
        $title = $request->searchQuery;
        return view('site.pages.searchresult', compact(['products', 'title']));
    }

    public function mail(Request $request){
        //dd($request->email);
        return $this->responseRedirect('site.contract', 'Yet To be implemented', 'success', false, false);
        //return redirect()->back();
    }
}
