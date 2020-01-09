@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
    </div>
</div>
@include('admin.partials.flash')

<div class="col-md-9">
    <div class="tab-content">
        <div class="tab-pane active" id="general">
            <div class="tile">
                <form action="{{ route('admin.users.store') }}" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="first_name">first_name</label>
                        <input class="form-control @error('first_name') is-invalid @enderror" type="text"
                            placeholder="Enter user first_name" id="first_name" name="first_name"
                            value="{{ old('first_name') }}" />

                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('first_name')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="last_name">last_name</label>
                        <input class="form-control @error('last_name') is-invalid @enderror" type="text"
                            placeholder="Enter user last_name" id="last_name" name="last_name"
                            value="{{ old('last_name') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('last_name')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                            placeholder="Enter user email" id="email" name="email" value="{{ old('email') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('email')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="address">address</label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                            placeholder="Enter user address" id="address" name="address" value="{{ old('address') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('address')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="phone_number">phone_number</label>
                        <input class="form-control @error('phone_number') is-invalid @enderror" type="text"
                            placeholder="Enter user phone_number" id="phone_number" name="phone_number"
                            value="{{ old('phone_number') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('phone_number')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="country">country</label>
                        <input class="form-control @error('country') is-invalid @enderror" type="text"
                            placeholder="Enter user country" id="country" name="country" value="{{ old('country') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('country')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="post_code">post_code</label>
                        <input class="form-control @error('post_code') is-invalid @enderror" type="text"
                            placeholder="Enter user post_code" id="post_code" name="post_code"
                            value="{{ old('post_code') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('post_code')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="city">city</label>
                        <input class="form-control @error('city') is-invalid @enderror" type="text"
                            placeholder="Enter user city" id="city" name="city" value="{{ old('city') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('city')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="state">state</label>
                        <input class="form-control @error('state') is-invalid @enderror" type="text"
                            placeholder="Enter user state" id="state" name="state" value="{{ old('state') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('state')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="text"
                            placeholder="Enter user password" id="password" name="password"
                            value="{{ old('password') }}" />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('password')
                            <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Brand</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.brands.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection