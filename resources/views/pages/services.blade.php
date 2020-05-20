@extends('layouts.app')

@section('content')

    <title>{{config('app.name', 'Bamboo-Blog')}} &bull; Services</title>

    <div class="container">
        <div class="row d-flex justify-content-center px-3 py-3">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                <ul class="list-group list-group-flush z-depth-1">
                    @foreach ($services as $service)
                        <li class="list-group-item">{{$service}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection