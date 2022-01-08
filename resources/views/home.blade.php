@extends('layouts.app')

@section('content')

<head>
  <title>Home</title>
</head>
<div class="container">
    <div class="card text-center intro homeElementBackground shadow-lg">
        <div class="card-header">
          
        </div>
        <div class="card-body">
          <h5 class="card-title">Welcome to CHS!</h5>
          <p class="card-text">Your reliable way of having the perfect semester!</p>
          <a href="timetable" class="btn btn-primary">Try our timetable generator! </a>
        </div>
        <div class="card-footer text-muted">
        
        </div>
    </div>
    <div class="row home-content">
        <div class="col-md-4">
            <div class="card shadow-lg p-3 mb-5 homeElementBackground" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Timetable Generator</h5>
                  
                  <p class="card-text">this timetable generator will help you create a new timetable for yourself, or 
                      modify and improve an existing timetable, with a few prefrences input.
                  </p>
                    <strong>
                    <a href="timetable" class="card-link">Try it now!</a>
                    </strong>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg p-3 mb-5 homeElementBackground" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">GPA calculator</h5>
                  <p class="card-text">This calculator will help you identify and calculate crucial metrics regarding your grades and GPA, 
                      it can also help you determine a minmum required grade to achieve a certain GPA.
                  </p>
                  <strong><a href="calc" class="card-link">Try it now!</a></strong>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg p-3 mb-5 homeElementBackground" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Contacts</h5>
                  <p class="card-text">Here you can find details about professor in our campus, emails, subjects they teach, and phone numbers if available.</p>
                  <strong><a href="contacts" class="card-link">Try it now!</a></strong>
                </div>
              </div>
        </div>

    </div>
</div>
@endsection
