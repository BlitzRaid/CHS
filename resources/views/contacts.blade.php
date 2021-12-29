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
      <!-- profButton trigger modal -->
      <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#AddProfessorModal">
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

      <!-- profModal -->
      <div class="modal fade" id="AddProfessorModal" tabindex="-2"aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add a new professor</h5>
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
                  <select id="inputState" name="department" class="form-select">
                    <option selected>Electrical and Mechanical</option>
                    <option>Computer and communication</option>
                    <option>Offshore</option>
                    <option>Civil</option>
                    <option>Production</option>
                  </select>
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
    <!-- delete confiramtion modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              You are about to delete professor {{ $contact->name }} PERMANENTLY, are you sure you want to continue?
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
              <a type="button" href="{{ route('delete', $contact->id) }}" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
      </div>
      {{-- end of delete confimation modal --}}
    <div class="justify-content-md-center row">
        <div class="col-md-8 ">
            
            <div class="row">
                <div class="card chsbackground m-2">
                    <h5 class="card-header">{{ $contact->name }}</h5>
                    <div class="card-body row">
                      <h5 class="card-title col-md-6">{{ $contact->department }}</h5>
                      <h5 class="card-text col-md-6">Additional info:</h5>
                      <p class="card-text col-md-10">{{ $contact->email }}</p>
                      
                      <a href="{{ route('emailForm', $contact->id) }}" class="btn btn-primary col-md-2">Email now</a>
                      @if (Auth::user())
                        <a href="" class="btn btn-success col-md-2 m-2 mb-0">Edit</a>
                        <a type="button" class="btn btn-danger col-md-2 m-2 mb-0" data-bs-toggle="modal" data-bs-target="#confirmModal">
                          Delete
                        </a>
                      @endif
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