@extends('layouts.app')

@section('content')
<div class="container">
<div class="row pt-4">

        <div class="col-md-6 offset-md-3 col-sm-12">

          <div class="card mt-4 p-3">
            <div class="card-body">
              <h1 class="card-title pb-3">Sign Up</h1>
              <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" >Full Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Your Full Name">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>
        
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" >E-Mail Address</label>

                        <input id="email" type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" >Password</label>

                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                            </div>

                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                    <label for="number" >Phone Number</label>

                    <input type="number" class="form-control" id="number" name="number" value="{{ old('number') }}" min="0" placeholder="Phone Number">
                    
                        @if ($errors->has('number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                        @endif
                </div>


                <div class="form-group">
                  <label for="intro">Introduction</label>
                  <textarea class="form-control" id="intro" name="intro" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <a href="/">Already have account? Log In</a>
                </div>
                
                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-block btn-primary">CREATE ACCOUNT</button>
                </div>

              </form>
            </div>
          </div>

        </div>
      </div>
</div>
@endsection
