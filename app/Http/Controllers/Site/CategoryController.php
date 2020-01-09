<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show($name)
    {
        error_log('ERROR AT Category Controller '.$name.' \n');
        $category = $this->categoryRepository->findByName($name);
        //dd($category);
        //return 'blyat';
        return view('site.pages.category', compact('category'));
        
    }
}