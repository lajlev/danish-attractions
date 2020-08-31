@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <h1 class="display-3">Attractions overview</h1>
      <div>
        <a style="margin: 20px;" href="{{ route('attractions.create')}}" class="btn btn-primary">Create attraction</a>
      </div>  
      <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td style="width:600px">Description</td>
              <td>Google maps</td>
              <td></td>

            </tr>
        </thead>
        <tbody>
          @foreach($attractions as $attraction)
          <tr>
              <td>{{$attraction->id}}</td>
              <td>{{$attraction->name}}</td>
              <td>{{Str::limit($attraction->description, 200)}}</td>
              <td><a href="{{$attraction->url_gmap}}" target="_blank">View map</a></td>
              <td>
                  <a style="display: inline-block" href="{{ route('attractions.edit',$attraction->id)}}" class="btn btn-primary">Edit</a>
                  <form style="display: inline-block" action="{{ route('attractions.destroy', $attraction->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <div>
      <a style="margin: 20px;" href="{{ route('attractions.create')}}" class="btn btn-primary">Create attraction</a>
    </div>  
@endsection

