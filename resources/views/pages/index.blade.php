@extends('layouts.app')

@section('content')

    <title>{{config('app.name', 'Bamboo-Blog')}} &bull; Home</title>

    <div class="container">
        <div class="row px-3 py-3">
            <!-- img -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
               <div class="view overlay zoom rounded z-depth-1">
                    <img src="{{asset('mdb/img/blog/27.jpg')}}" class="rounded img-fluid" alt="">
                    <a href="/index">
                        <div class="mask waves-effect waves-ripple rgba-black-light"></div>
                    </a>
               </div>
            </div>

            <!-- home page description -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                <div class="flex-center">
                    <div class="text-center p-3">
                        <h1 class="h3-responsive uppercase font-bold text-gray-800 mb-3">
                            Welcome to Bamboo Blogs
                        </h1>
                        <p class="mb-3 font-small text-gray-600">
                            This is a laravel application from Bamboo <sup>TM</sup>. We are a creative
                            agency that is geared towards providing a safe and secure enviroment for our
                            users to share their thoughts and disseminate knowledge.
                        </p>
                        @guest
                            <a href="/register" type="button" class="btn btn-pink btn-md rounded mx-0">
                                Sign Up
                            </a>

                            <a href="/login" type="button" class="btn btn-orange btn-md rounded mx-0">
                                Log In
                            </a>
                            @else
                            <a href="/home" type="button" class="btn light-green accent-4 white-text btn-md rounded mx-0">
                                Get Started
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection