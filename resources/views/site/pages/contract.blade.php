@extends('site.app')
@section('title', 'Contact Us')
@section('content')
@include('admin.partials.flash')
@include('site.partials.nav')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">Contact Us</h2>
    </div>
</section>

<section class="section-content bg padding-y">
    <div class="container">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">Submission Form</h4>
                </header>
                <article class="card-body">
                    <form action="{{ route('contract.mail') }}" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Desctiption</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                style="height: 100px" name="description" id="description"
                                value="{{ old('description') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block"> Submit </button>
                        </div>
                    </form>


                    </form>
                </article>

            </div>
        </div>
    </div>
</section>
@stop