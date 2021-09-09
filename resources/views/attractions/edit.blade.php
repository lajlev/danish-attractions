@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3 p-3">Update Attraction</h1>

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      <br /> 
      @endif
      <form method="post" action="{{ route('attractions.update', $attraction->id) }}">
            @method('PATCH') 
            @csrf
          
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $attraction->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="6">{{ $attraction->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="url_gmap">Google maps link</label>
                <input type="text" class="form-control" name="url_gmap" value="{{ $attraction->url_gmap }}">
            </div>
            <div class="form-group">
                <label for="image">Image <span class="badge bg-info text-wrap p-1 text-white">Michael only </span></label>
                <input type="text" class="form-control" name="image" placeholder="fx. odense-zoo.jpg" value="{{ $attraction->image }}">
            </div>
            <div class="form-group">    
                <label for="image">Latitude</label>
                <input type="text" class="form-control" name="latitude" placeholder="fx. 55.12345" value="{{ $attraction->latitude }}">
            </div>
            <div class="form-group">    
                <label for="image">Longitude</label>
                <input type="text" class="form-control" name="longitude" placeholder="fx. 10.12345" value="{{ $attraction->longitude }}">
            </div>
            

          
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

