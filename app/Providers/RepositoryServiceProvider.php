<?php

namespace App\Providers;

use App\Interfaces\AnnouncementInterface;
use App\Interfaces\AttributeInterface;
use App\Interfaces\BrandInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\UserInterface;
use App\Repositories\AnnouncementRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryInterface::class => CategoryRepository::class,
        UserInterface::class => UserRepository::class,
        AnnouncementInterface::class => AnnouncementRepository::class,
        AttributeInterface::class => AttributeRepository::class,
        BrandInterface::class => BrandRepository::class,
        ProductInterface::class => ProductRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


}
