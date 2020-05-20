@extends('layouts.app')

@section('content')
<title>{{config('app.name', 'Bamboo-Blog')}} &bull;  {{ Auth::user()->name }}</title>
<div class="container">
    <div class="row d-flex justify-content-center px-5">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mt-2 mb-2">
            @include('includes.messages')
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3">
            <div class="text-left mb-4">
                <a href="/posts/create" class="btn btn-md bg-pink-500 white-text">
                    Create Post
                </a>
            </div>

            <div class="mb-4">
                <table class="table table-sm table-striped" id="postsTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="px-3">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-2">{{$post->title}}</td>
                                <td>{{$post->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-success btn-sm rounded-full white-text mr-5">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a class="btn btn-danger btn-sm rounded-full white-text deletePost">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'id' => 'deletePostForm'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
