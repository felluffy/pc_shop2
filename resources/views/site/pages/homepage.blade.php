@extends('site.app')
@section('title', 'Homepage')

@section('content')
@include('site.partials.nav')
<section class="section-main bg padding-top-sm">
    <div class="container">
        <div class="card">
            <header class="card-header">
                <h4 class="card-title mt-1"> Latest Announcement: {{$announcement->title}}</h4>
            </header>
            <article class="card-body">
                {{$announcement->content}}
            </article>
        </div>
    </div>
    </div>
</section>
<section class="section-content padding-y-sm bg">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg">Featured Categories</h4>
        </header>
        <div class="row">
            @forelse ($categories->take(3) as $category)
            <div class="col-md-4">
                <div class="card-banner">
                
                    <div class="img-wrap padding-x"><img src="{{ asset($category->image)}}" alt=""></div>
                    <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h5 class="card-title">{{$category->name}}</h5>
                            
                            <a href="{{ route('category.show', $category->name) }}" id="{{ $category->name }}" class="btn btn-warning btn-sm"> View All </a>
                        </div>
                    </article>
                </div>
            </div>
            @empty
            <p>It's empty here</p>
            @endforelse
        </div>

        <header class="section-heading heading-line">
            <h4 class="title-section bg">Featured Products</h4>
        </header>
        <br>
        <div class="row">
            @forelse ($products->take(6) as $product)
            <div class="col-md-4">
                <figure class="card card-product">
                    @if ($product->images->count() > 0)
                        <div class="img-wrap padding-y"><img src="{{ asset($product->images->first()->full) }}" alt=""></div>
                    @else
                        <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                    @endif
                    <figcaption class="info-wrap">
                        <h4 class="title"><a href="{{ route('product.show', $product->name) }}">{{ $product->name }}</a>
                        </h4>
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i> Buy
                            Now</a>
                        @if ($product->sale_price != 0)
                        <div class="price-wrap h5">
                            <span class="price"> {{ '$'.$product->sale_price }} </span>
                            <del class="price-old"> {{ '$'.$product->price }}</del>
                        </div>
                        @else
                        <div class="price-wrap h5">
                            <span class="price"> {{ '$'.$product->price }} </span>
                        </div>
                        @endif
                    </div>
                </figure>
            </div>
            @empty
            <p>It's empty here</p>
            @endforelse
        </div>
    </div>
</section>
@stop