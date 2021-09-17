@extends('layouts.app')

@section('title', 'Oplev danske attraktioner')

@push('scripts-header')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
@endpush

@push('scripts-footer')
    <script>
        var mapAttractions = [
        @foreach ($attractions as $attraction)
            @isset($attraction->latitude)
                ["{{$attraction->name}}", {{$attraction->latitude}}, {{$attraction->longitude}}],
            @endisset
        @endforeach
            
        ];
    </script>
    <script src="{{ asset('js/map-attractions.js') }}" defer></script>
@endpush



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
                        Stadig {{$attractionsNotVisited->count()}} attraktioner du ikke har besøgt.    
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
                                <a class="btn btn-outline-success" href="{{ route('visits.create', $attraction->id) }}">✅ Har været der</a>
                                <a class="btn btn-outline-secondary" target="_blank" href="{{$attraction->url_gmap}}">📍 Se kort</a>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                </div>

                <h1 class="mt-5 mb-5">
                    @if ( $attractionsVisited->count() != 0 && $attractionsVisited->count() != $attractions->count())
                        Du har besøgt {{$attractionsVisited->count()}} attraktioner 🎊
                    @elseif( $attractionsVisited->count() == 0 )
    
                    @elseif( $attractionsVisited->count()==$attractions->count() )
                        Du har besøgt alle {{$attractions->count()}} attraktioner med <span style="color:brown">brune skilte</span> 🇩🇰 🇩🇰 🇩🇰
                    @endif
                </h1>

                <div class="row">
                    @foreach ($attractionsVisited as $attraction)
                    
                        <div class="col-sm-6">
                            <div class="card mb-3">
                                @isset($attraction->image)
                                    <img class="card-img-top" src="/images/attractions/{{$attraction->image}}" alt="Billede af {{$attraction->name}}">
                                @endisset
                                <div class="card-body">
                                    <h3>{{$attraction->name}}</h3>
                                    <p>{{Str::limit($attraction->description, 100)}}</p>
                                    <p><i>👣 {{ $attraction->pivot->created_at->diffForHumans() }}</i> &nbsp; <a href="{{ route('visits.delete', $attraction->id) }}" onclick="return confirm('Fjern besøg ved {{$attraction->name}}?')">Fjern besøg</a></p>
                                    <a class="btn btn-outline-secondary" target="_blank" href="{{$attraction->url_gmap}}">📍 Vis vej</a>
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
        <span class="sr-only">Forrige</span>
    </a>
    <a class="carousel-control-next" href="#teaser" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Næste</span>
    </a>
    </div>{{--  END Teaser --}}
    
    <div class="jumbotron jumbotron-fluid mb-0">
        <div class="container">
            <h1>🧭 Besøg <strong>Brune skilte</strong> attraktioner</h1>
            <p class="lead">Tilmeld dig for at se alle attraktioner, log dine besøg og find vej via google maps.</p>
            <p><a class="btn btn-primary btn-lg" href="/register" role="button">Tilmeld dig - gratis</a></p>
        </div>
    </div> 
    <div class="jumbotron jumbotron-fluid p-0">
        <div id="map-attractions"></div>
    </div> 
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1 class="mt-5 mb-5">
                    3 udvalgte attraktioner
                </h1>
    
                <div class="row">
                    @foreach ($attractionsRandom as $attraction)
                    
                        <div class="col-sm-4">
                            <div class="card mb-3">
                                @isset($attraction->image)
                                    <img class="card-img-top" src="/images/attractions/{{$attraction->image}}" alt="Billede af {{$attraction->name}}">
                                @endisset
                                <div class="card-body">
                                    <h3>{{$attraction->name}}</h3>
                                    <p>{{$attraction->description}}</p>
                                    <a class="btn btn-outline-secondary" target="_blank" href="{{$attraction->url_gmap}}">📍 Vis vej</a>
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
