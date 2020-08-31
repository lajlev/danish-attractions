@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">Update Attraction</h1>

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
              <input type="text" class="form-control" name="name" value={{ $attraction->name }} />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value={{ $attraction->description }} />
        </div>
        <div class="form-group">
          <label for="url_gmap">Google maps link</label>
          <input type="text" class="form-control" name="url_gmap" value={{ $attraction->url_gmap }} />
      </div>

          
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

