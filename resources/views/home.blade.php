@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mb-5">
                {{ __('Attractions') }}
            </h1>
            
            <h2 class="mb-5">
                Not visited yet 🚗
            </h2>
            <div class="row">
            @foreach ($attractions as $attraction)
            
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <h4 class="card-header">
                            {{$attraction->name}}
                        </h4>

                        <div class="card-body">
                            <p>{{$attraction->description}}</p>
                            <a class="btn btn-success">Mark as Visited</a>
                            <a class="btn btn-link" href="{{$attraction->url_gmap}}">Directions</a>
                        </div>
                    </div>
                </div>
            
            @endforeach
        </div>    
    </div>
</div>
@endsection
