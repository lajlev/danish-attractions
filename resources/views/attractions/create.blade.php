@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
     <h1 class="display-3 p-3">Add Attraction</h1>
   <div>
     @if ($errors->any())
       <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
             @endforeach
         </ul>
       </div><br>
     @endif
       <form method="post" action="{{ route('attractions.store') }}">
           @csrf
           <div class="form-group">    
               <label for="name">Name</label>
               <input type="text" class="form-control" name="name" placeholder="fx. Voergaard Slot">
           </div>
           <div class="form-group">    
              <label for="description">Description</label>
              <textarea class="form-control" name="description" rows="6" placeholder="fx. Awesome description from wikipedia"></textarea>
          </div>
          <div class="form-group">    
              <label for="url_gmap">Google maps link</label>
              <input type="text" class="form-control" name="url_gmap" placeholder="fx. https://g.page/VoergaardSlot">
          </div>
          <div class="form-group">    
              <label for="image">Image <span class="badge bg-info text-wrap p-1 text-white">Michael only </span></label>
              <input type="text" class="form-control" name="image" placeholder="fx. odense-zoo.jpg">
          </div>
          <div class="form-group">    
            <label for="image">Latitude</label>
            <input type="text" class="form-control" name="latitude" placeholder="fx. 55.12345">
            <div class="form-text text-muted">Convert an address to coordinates on <a href="https://www.gps-coordinates.net/">gps-coordinates.net</a></div>
        </div>  
          <div class="form-group">    
              <label for="image">Longitude</label>
              <input type="text" class="form-control" name="longitude" placeholder="fx. 10.12345">
          </div>
          
           <button type="submit" class="btn btn-primary">Create</button>
       </form>
   </div>
 </div>
 </div>
@endsection

