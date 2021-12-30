@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="justify-content-center row">
        <div class="col-md-8">
            <h1>Send an Email to your professor <div class="small-text">or go back to all contacts <a href="{{ route('web.search') }}">here</a></div></h1>
            <h5>NOTE! this email will be sent from the CHS official email, your professor cannot reply to you unless you provide your email.</h5>

        <form action="{{ route('send.email') }}" method="POST">

            @csrf

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

            <div class="form-group">
                <label for="" class="">Professor's Email:</label>
                <div class="">
                  <input type="text" name="targetemail" readonly class="form-control" id="staticEmail" value="{{ $targetemail }}">
                </div>
              </div>
            <div class="form-group ">
                <label for="">Your Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>
            <div class="form-group ">
                <label for="">Your Email</label>
                <input type="text" class="form-control" name="email" ">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>
            <div class="form-group ">
                <label for="">Subject</label>
                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>
            <div class="form-group ">
                <label for="">Message</label>
                <textarea name="message" class="form-control" cols="4" rows="6">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>
            <button class="btn btn-primary m-2">Send</button>
        
        </form>
        </div>
        
    </div>
</div>
@endsection