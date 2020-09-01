@extends('layouts.app')

@section('content')
@if (Auth::check())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <h5 class="mt-2">{{ session('status') }}</h5>
                    </div>
                @endif

                @if ($attractionsNotVisited->count() != 0)
                    <h1 class="mt-5 mb-5">
                        Still {{$attractionsNotVisited->count()}} attractions to visit.    
                    </h1>
                @endif                    

                <div class="row">
                    @foreach ($attractionsNotVisited as $attraction)
                
                        <div class="col-sm-6">
                            <div class="card mb-3">
                                @isset($attraction->image)
                                    <img class="card-img-top" src="/images/attractions/{{$attraction->image}}" alt="Image of {{$attraction->name}}">
                                @endisset
                                <div class="card-body">
                                    <h3>{{$attraction->name}}</h3>
                                    <p>{{$attraction->description}}</p>
                                <a class="btn btn-success" href="{{ route('visits.create', $attraction->id) }}">👣 Been there</a>
                                <a class="btn btn-secondary" target="_blank" href="{{$attraction->url_gmap}}">📍 Directions</a>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                </div>

                <h1 class="mt-5 mb-5">
                    @if ( $attractionsVisited->count() != 0 && $attractionsVisited->count() != $attractions->count())
                        You have visited {{$attractionsVisited->count()}} attractions 🎊
                    @elseif( $attractionsVisited->count() == 0 )
    
                    @elseif( $attractionsVisited->count()==$attractions->count() )
                        You have visited all {{$attractions->count()}} official attractions from <span style="color:brown">Brown roadside signs</span>  🇩🇰🇩🇰🇩🇰
                    @endif
                </h1>

                <div class="row">
                    @foreach ($attractionsVisited as $attraction)
                    
                        <div class="col-sm-6">
                            <div class="card mb-3">
                                @isset($attraction->image)
                                    <img class="card-img-top" src="/images/attractions/{{$attraction->image}}" alt="Image of {{$attraction->name}}">
                                @endisset
                                <div class="card-body">
                                    <h3>{{$attraction->name}}</h3>
                                    <p>{{$attraction->description}}</p>
                                    <p><i>👣 {{ $attraction->pivot->created_at->diffForHumans() }}</i> &nbsp; <a href="{{ route('visits.delete', $attraction->id) }}" onclick="return confirm('Remove you visit at {{$attraction->name}}?')">Remove</a></p>
                                    <a class="btn btn-lg btn-secondary" target="_blank" href="{{$attraction->url_gmap}}">📍 Directions</a>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            </div>    
        </div>
    </div>
@else
    <div id="teaser" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="false">
    <ol class="carousel-indicators">
        <li data-target="#teaser" data-slide-to="0" class="active"></li>
        <li data-target="#teaser" data-slide-to="1"></li>
        <li data-target="#teaser" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="/images/attractions/valdemars-slot.jpg" alt="Valdemars slot">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="/images/attractions/odense-zoo.jpg" alt="Odense Zoo">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="/images/attractions/nyborg-slot.jpg" alt="Nyborg slot">
        </div>
    </div>
    <a class="carousel-control-prev" href="#teaser" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#teaser" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>{{--  END Teaser --}}
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>🧭 Explore the attractions behind the <span style="color:brown">Brown roadside signs</span></h1>
            <p class="lead">Join to see all attractions, log your visits and get directions via google maps.</p>
            <p><a class="btn btn-primary btn-lg" href="/register" role="button">Join now</a></p>
        </div>
    </div> 
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1 class="mt-5 mb-5">
                    3 featured attractions
                </h1>
    
                <div class="row">
                    @foreach ($attractionsRandom as $attraction)
                    
                        <div class="col-sm-4">
                            <div class="card mb-3">
                                @isset($attraction->image)
                                    <img class="card-img-top" src="/images/attractions/{{$attraction->image}}" alt="Image of {{$attraction->name}}">
                                @endisset
                                <div class="card-body">
                                    <h3>{{$attraction->name}}</h3>
                                    <p>{{$attraction->description}}</p>
                                    <a class="btn btn-secondary" target="_blank" href="{{$attraction->url_gmap}}">📍 Directions</a>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            </div>    
        </div>
    </div>
@endif
        
@endsection
