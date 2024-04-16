@extends('theme.master')

@section('page name', 'Register')

@section('content')

@include('theme.partials.hero', ['title' => 'Register'])

<!-- ================ register section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('register') }}" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input value="{{old('name')}}" class="form-control border" name="name" id="name" type="text" placeholder="Enter your name">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <div class="form-group">
                            <input value="{{old('email')}}" class="form-control border" name="email" id="email" type="email" placeholder="Enter email address">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <div class="form-group">
                            <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation">
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-contactForm">Register</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
<!-- ================ register section end ================= -->

@endsection