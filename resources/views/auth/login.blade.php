@extends('layouts.app')

@section('content')
<div class="container">
          <div class="row pt-4">

        <div class="col-md-6 offset-md-3 col-sm-12">

          <div class="card mt-4 p-3">
            <div class="card-body">
              <h1 class="card-title pb-3">Log In</h1>
              <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" >Password</label>

                            <input id="password" type="password" class="form-control" name="password" required placeholder="Enter Password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                <div class="form-group">
                  <a href="signup"><i class="fa fa-user-o"></i> Create New Account</a>
                </div>
                
                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-block btn-primary">LOG IN</button>
                </div>
                </form>
            </div>
          </div>

        </div>
      </div>

</div>
@endsection
