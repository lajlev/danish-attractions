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
                                <div class="card-body">
                                    <h3>{{$attraction->name}}</h3>
                                    <p>{{$attraction->description}}</p>
                                <a class="btn btn-lg btn-success" href="{{ route('visits.create', $attraction->id) }}">👣 Been there</a>
                                    <a class="btn btn-lg btn-secondary" target="_blank" href="{{$attraction->url_gmap}}">📍 Directions</a>
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
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>Explore the attractions behind the <span style="color:brown">Brown roadside signs</span></h1>
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
                                <div class="card-body">
                                    <h3>{{$attraction->name}}</h3>
                                    <p>{{$attraction->description}}</p>
                                    <a class="btn btn-lg btn-secondary" target="_blank" href="{{$attraction->url_gmap}}">📍 Directions</a>
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
