@extends('layouts.app')

@section('content')

    <title>{{config('app.name', 'Bamboo-Blog')}} &bull; Posts</title>

    <div class="container">
        <div class="row d-flex justify-content-end px-5 pt-1">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                {{$posts->links()}}
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                @include('includes.messages')
            </div>
        </div>
        <div class="row d-flex justify-content-center px-5">
            @if (count($posts) < 1)
                <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 mb-3">
                    <div class="row">
                        <div class="col-md-7 mb-4">
                            <div class="view">
                                <img src="{{asset('mdb/img/blog/4png.png')}}" class="img-fluid" alt="smaple image">
                            </div>
                        </div>

                        <div class="col-md-5 d-flex align-items-center">
                            <div>
      
                                <h3 class="font-weight-bold mb-4">Blog Posts</h3>
                      
                                <p class="mb-4">
                                    There are currently no blog posts yet. Please sign up or log in
                                    to get started.
                                </p>
                    
                                @guest
                                    <a href="/register" type="button" class="btn btn-pink btn-md rounded mx-0">
                                        Sign Up
                                    </a>

                                    <a href="/login" type="button" class="btn btn-orange btn-md rounded mx-0">
                                        Log In
                                    </a>
                                @else
                                    <a href="/home" type="button" class="btn btn-pink white-text btn-md rounded mx-0">
                                        Get Started
                                    </a>
                                @endguest
                      
                              </div>
                        </div>
                    </div>
                </div>
            @else

            @foreach ($posts as $post)
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 text-center mb-3">
                    <div class="view overlay rounded z-depth-2 mb-lg-2 mb-4">
                        <img src="{{asset('storage/cover_images/'.$post->cover_image)}}" class="img-fluid fixed" alt="Blog Post: <?php echo $post->title ?> Image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Category -->
                    <a href="/posts/{{$post->id}}" class="pink-text">
                        <h6 class="font-weight-bold mb-3">
                            <i class="fas fa-map pr-2"></i>
                            {{$post->category}}
                        </h6>
                    </a>

                    <!-- Post title -->
                    <h4 class="font-weight-bold mb-3">
                        <a href="/posts/{{$post->id}}" class="text-decoration-none hover:text-pink-600">
                            <strong>{{$post->title}}</strong>
                        </a>
                    </h4>

                    <!-- Post data -->
                    <p class="mb-3">
                        by <a class="font-weight-bold">{{$post->user->name}}</a>,
                        <?php echo $post->created_at; ?>
                    </p>

                    <!-- Read more button -->
                    <a href="/posts/{{$post->id}}" class="btn pink accent-2 rounded-full text-white btn-rounded btn-md">Read more</a>
                </div>
            @endforeach
            @endif
        </div>
    </div>

@endsection