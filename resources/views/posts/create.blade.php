@extends('layouts.app')

@section('content')

<title>{{config('app.name', 'Bamboo-Blog')}} &bull; Create Post</title>

<div class="container">
    <div class="row px-3 d-flex justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mt-3">
            @include('includes.messages')
        </div>
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mt-3 mb-3">
            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="w-full mb-3">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title', '', ['class' => 'w-full shadow-md bg-white border border-white rounded px-3 py-3 leading-tight focus:bg-white focus:outline-none', 'placeholder' => 'Title'])}}
                        </div>

                        <div class="w-full mb-3">
                            {{Form::label('category', 'Category')}}
                            {{Form::text('category', '', ['class' => 'w-full shadow-md bg-white border border-white rounded px-3 py-3 leading-tight focus:bg-white focus:outline-none', 'placeholder' => 'Category'])}}
                        </div>

                        <div class="w-full mb-3">
                           {{Form::file('cover_image')}}
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="w-full mb-3">
                            {{Form::label('body', 'Body')}}
                            {{Form::textarea('body', '', ['class' => 'w-full shadow-md bg-white border border-white rounded px-3 py-3 leading-tight focus:bg-white focus:outline-none', 'id' => 'summary-ckeditor', 'placeholder' => 'Body text'])}}
                        </div>

                        {{Form::submit('Submit', ['class' => 'px-5 py-3 pink accent-2 text-white uppercase font-small rounded shadow-md hover:shadow-lg focus:outline-none'])}}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- ckeditor -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>

@endsection