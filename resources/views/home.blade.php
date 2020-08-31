@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <h5 class="mt-2">{{ session('status') }}</h5>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Auth::check())

  
                <h1 class="mt-5 mb-5">
                    @if ($attractionsNotVisited->count() != 0)
                        Still {{$attractionsNotVisited->count()}} attractions to visit.    
                    @endif
                    
                </h1>
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
                    @if ($attractionsVisited!=$attractions)
                        You have visited {{$attractionsVisited->count()}} attractions 🎊
                    @else
                        Amazing 🇩🇰🇩🇰🇩🇰 You have visited all {{$attractions->count()}} official attractions from <span style="color:brown">Brown roadside signs</span>  🇩🇰🇩🇰🇩🇰
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
            @else
                <h1 class="mt-5 mb-5">
                    All {{$attractions->count()}} official attractions from <span style="color:brown">Brown roadside signs</span>.
                </h1>
                <div class="row">
                @foreach ($attractions as $attraction)
                
                    <div class="col-sm-6">
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
            @endif
        </div>    
    </div>
</div>
@endsection
