@extends('layouts.app')

@section('content')

<title>{{config('app.name', 'Bamboo-Blog')}} &bull; {{$post->title}}</title>

<div class="container">
    <div class="row px-5 py-3">
        <!-- post image -->
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 mb-3">
            <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                <img src="{{asset('storage/cover_images/'.$post->cover_image)}}" class="img-fluid fixed" alt="Blog Post: <?php echo $post->title ?> Image">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        </div>

        <!-- post description -->
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 mb-3">
            <!-- go back -->
            <a href="/posts" class="text-gray-900 btn btn-sm btn-outline-dark rounded-full">
                Go back
            </a>

            <div class="mt-3">
                @include('includes.messages')
            </div>

            <!-- Category -->
            <a href="#!" class="pink-text">
                <h6 class="font-weight-bold mt-3 mb-3">
                    <i class="fas fa-map pr-2"></i>
                    {{$post->category}}
                </h6>
            </a>

            <!-- Post title -->
            <h3 class="font-weight-bold mb-3"><strong>{{$post->title}}</strong></h3>

            <!-- Excerpt -->
            <p class="mb-4">
                {!!$post->body!!}
            </p>

            <!-- Post data -->
            <p class="font-small mt-3">
                by <a><strong>{{$post->user->name}}</strong></a>,
                {{$post->created_at->format('d/m/Y')}}
            </p>

            @if (!Auth::guest())
                @if (Auth::user()->id == $post->user_id)
                    <!-- Edit -->
                    <a href="/posts/{{$post->id}}/edit" class="btn light-green accent-4 btn-sm white-text mt-3">
                        <i class="fas fa-edit pr-2"></i> Edit
                    </a>
                @endif
            @endif
        </div>
    </div>
</div>

@endsection