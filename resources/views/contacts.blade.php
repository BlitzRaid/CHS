@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">
  <div class="col-md-6">
    <h4>Search</h4>
    <form action="{{ route('web.search') }}" method="GET">
      <div class="form-group">
        <label for="">Enter Professor name</label>
        <input type="text" class="form-control" name="query" placeholder="Search here....">
      </div>
      <div class="form-group">
        <button type="submit" class=" m-1 btn btn-primary col-md-2"><strong>Search</strong></button>
      </div>
    </form>
  </div>
</div>
@if (!empty($request))
  <div class="row justify-content-md-center">
    <p class="col-md-6">You searched for: "{{ $request }}"</p>
  </div>
@endif  

@if (Auth::user())
  <div class="justify-content-md-center row" >
    <div class="col-md-8">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add new Professor
      </button>

      @if (Session::has('error'))
          <div class="alert alert-danger">
              {{ Session::get('error') }}
          </div>   
      @endif

      @if (Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>    
      @endif

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add a new professor</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('store.prof') }}" method="POST">
              @csrf

            <div class="modal-body">
              
                <div class="form-group">
                  <label>Professor name</label>
                  <input class="form-control" name="name" placeholder="Enter name">
                  
                </div>
                <div class="form-group">
                  <label>Professor Email</label>
                  <input type="email" class="form-control"  name="email"  placeholder="enter email">
                </div>
                <div class="form-group">
                  <label>Professor Department</label>
                  <input class="form-control"  name="department"  placeholder="enter department">
                </div>  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

@if (count($contacts)> 0)
 
  @foreach ($contacts as $contact)
    <div class="justify-content-md-center row">
        <div class="col-md-8 ">
            
            <div class="row">
                <div class="card chsbackground m-2">
                    <h5 class="card-header">{{ $contact->name }}</h5>
                    <div class="card-body row">
                      <h5 class="card-title col-md-6">{{ $contact->department }}</h5>
                      <h5 class="card-text col-md-6">Additional info:</h5>
                      <p class="card-text col-md-10">{{ $contact->email }}</p>
                      <a href="{{ route('emailForm') }}" class="btn btn-primary col-md-2">Email now</a>
                    </div>
                  </div>
                  <br>
            </div>
        </div>
    </div>
  @endforeach

@else
<div class="row justify-content-md-center">
  <h4 class="col-md-6 m-3">No results found, try refining your search</h4>
</div>
@endif
  
  
<div class="d-flex justify-content-center pagination">
  {{ $contacts->links('layouts.paginationlinks') }}
</div>

    
@endsection