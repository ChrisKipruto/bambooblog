@extends('layouts.app')

@section('content')

    <title>{{config('app.name', 'Bamboo-Blog')}} &bull; About</title>

    <div class="container">
        <div class="row d-flex justify-content-center px-3 py-3">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                      <img class="rounded-lg z-depth-2 md:w-56" src="{{asset('mdb/img/blog/blog1.jpg')}}" alt="About Bamboo Bay">
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-6">
                        <div class="uppercase tracking-wide text-sm text-pink-600 font-bold">About Us</div>
                        <a href="#" class="block mt-1 text-lg leading-tight font-semibold text-gray-900 hover:text-pink-600 hover:underline">
                            Finding readers for you new blog post.
                        </a>
                        <p class="mt-2 text-gray-600">
                            Formulating thoughts and getting them off the ground is hard work. With
                            <span>Bamboo,</span> we have designed easy strategies that you can use to find your first reader.
                        </p>
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection