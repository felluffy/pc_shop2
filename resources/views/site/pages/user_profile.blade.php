@extends('site.app')
@section('bsdf', 'b4')
@section('content')
@include('admin.partials.flash')
@include('site.partials.nav')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">Edit Profile</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        @guest
            <div class="col form-group">
                <section class="section-subscribe padding-y-lg">
                    <div class = "container">
                        <p class="pb-2 text-center black">You must login to see this page</p>
                    </div>
                </section>
            </div>
        @else
        <form action="{{ route('user.profile.update') }}" method="POST" role="form">
            @csrf
            <div class="form-row">
                <div class="col form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                        id="first_name" value="{{ old('first_name', $user->first_name) }}">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                        id="last_name" value="{{ old('last_name', $user->last_name) }}">
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email">E-Mail Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    value="{{ old('email', $user->email) }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address"
                    value="{{ old('address', $user->address) }}">
            </div>
            <div class=form-row>
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input class="form-control" type="text" name="city" id="city"
                        value="{{ old('city', $user->city) }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <input class="form-control" type="text" name="country" id="country"
                        value="{{ old('country', $user->country) }}">
                </div>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input class="form-control" type="text" name="state" id="state"
                    value="{{ old('state', $user->state) }}">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input class="form-control" type="text" name="phone_number" id="phone_number"
                    value="{{ old('phone_number', $user->phone_number) }}">
            </div>
            <div class="form-group">
                <label for="post_code">Post code</label>
                <input class="form-control" type="text" name="post_code" id="post_code"
                    value="{{ old('post_code', $user->post_code) }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block"> Update Information </button>
            </div>
        </form>
        @endguest
    </div>
</section>
@stop