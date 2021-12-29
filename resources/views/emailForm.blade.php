@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>send an email to your professor</h1>

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
                <label for="">Your Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>
            <div class="form-group">
                <label for="">Your Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>
            <div class="form-group">
                <label for="">Subject</label>
                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" class="form-control" cols="4" rows="4">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>
            <button class="btn btn-primary m-2">Send</button>
        </form>
    </div>
</div>
@endsection