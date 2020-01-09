<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\BrandInterface;

class BrandController extends BaseController
{
    protected $brandRepository;

    public function __construct(BrandInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $brands = $this->brandRepository->listBrands();

        $this->setPageTitle('Brands', 'List of all brands');
        return view('admin.brands.index', compact('brands'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $brand = $this->brandRepository->updateBrand($params);

        if (!$brand) {
            return $this->responseRedirectBack('Error occurred while updating brand.', 'error', true, true);
        }
        return $this->responseRedirectBack('Brand updated successfully', 'success', false, false);
    }
    public function edit($id)
    {
        $brand = $this->brandRepository->findBrandById($id);

        $this->setPageTitle('Brands', 'Edit Brand : ' . $brand->name);
        return view('admin.brands.edit', compact('brand'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $brand = $this->brandRepository->createBrand($params);

        if (!$brand) {
            return $this->responseRedirectBack('Error occurred while creating brand.', 'error', true, true);
        }
        return $this->responseRedirect('admin.brands.index', 'Brand added successfully', 'success', false, false);
    }

    public function create()
    {
        $this->setPageTitle('Brands', 'Create Brand');
        return view('admin.brands.create');
    }

    public function delete($id)
    {
        $brand = $this->brandRepository->deleteBrand($id);
        if (!$brand) {
            return $this->responseRedirectBack('Error occured while deletingf brand.', 'error', true, true);
        }
        return $this->responseRedirect('admin.brands.index', 'brand deleted successfully', 'success', false, false);
    }

}
