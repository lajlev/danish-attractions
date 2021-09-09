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
              <input type="text" class="form-control" name="description" placeholder="fx. Awesome description from wikipedia">
          </div>
          <div class="form-group">    
              <label for="url_gmap">Google maps link</label>
              <input type="text" class="form-control" name="url_gmap" placeholder="fx. https://g.page/VoergaardSlot">
          </div>
          <div class="form-group">    
              <label for="image">Image</label>
              <input type="text" class="form-control" name="image" placeholder="fx. odense-zoo.jpg">
          </div>
          <div class="form-group">    
              <label for="image">Longitude</label>
              <input type="text" class="form-control" name="longitude" placeholder="fx. FX 55.12345">
          </div>
          <div class="form-group">    
              <label for="image">Latitude</label>
              <input type="text" class="form-control" name="latitude" placeholder="fx. FX 10.12345">
          </div>  
           <button type="submit" class="btn btn-primary">Create</button>
       </form>
   </div>
 </div>
 </div>
@endsection

