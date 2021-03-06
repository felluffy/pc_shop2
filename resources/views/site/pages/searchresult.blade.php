@extends('site.app')
@section('title', $title.' result')

@section('content')
@include('site.partials.nav')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">Search Result</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        <div id="code_prod_complex">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <figure class="card card-product">
                            @if ($product->images->count() > 0)
                                <div class="img-wrap padding-y"><img src="{{ asset($product->images->first()->full) }}" alt=""></div>
                            @else
                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                            @endif
                            <figcaption class="info-wrap">
                                <h4 class="title"><a href="{{ route('product.show', $product->name) }}">{{ $product->name }}</a></h4>
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
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
                    <p>No Products found in under {{ $title }}.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@stop