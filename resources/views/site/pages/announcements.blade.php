@extends('site.app')
@section('title', 'Announcements')
@section('content')
@include('site.partials.nav')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">Announcements</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        <div class="card">
            
            <div class="col-md-12 mx-auto">
                
                
                Sort by
                <div class="dropdown-content">
                    <a href="{{ route('site.announcements.index', ['sort' => 'asc']) }}"> Ascending</a>
                    <a href="{{ route('site.announcements.index') }}">Descending</a>
                </div>
                
                @foreach ($announcements as $announcement)
                <div class="card text-center">
                    <header class="card-header">
                        <h4 class="card-title mt-2"> {{$announcement->title}}</h4>
                    </header>
                    <article class="card-body">
                        {{$announcement->content}}
                    </article>
                    <div class="card-footer bg-transparent">
                        {{ $announcement->created_at->format('d M Y - H:i:s') }}
                    </div>

                </div>
                <br>
                @endforeach
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        {{ $announcements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop