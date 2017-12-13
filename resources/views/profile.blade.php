@extends('layouts.in')

@section('content')
<div class="container">
      <div class="row pt-4">

        <div class="col-lg-4 col-sm-12 pb-4">
          <div class="card">
            <img class="card-img-top" src="{{ asset('images/profile.png') }}" alt="Card image cap">
            <div class="card-body">
              @if($errors->any())
              <h4 class='danger'>
                <font face="arial" color="red">{{$errors->first()}}</font></h4>
              @endif
              <h4 class="card-title" id="fullname">{{ ucwords($user->name)}}</h4>
              <p class="card-text" id="phone">{{ $user->number }}</p>
              <p class="card-text" id="email">{{ $user->email }}</p>
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editProfile"><i class="fa fa-pencil"></i> Edit Profile</a>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-sm-12">
          <div class="card bg-light">
            <div class="card-body">
              <h4 class="card-title"><i class="fa fa-user-o"></i> Introduction</h4>
              <p class="card-text" id="intro">{{ $user->intro }}</p>
            </div>
          </div>

          <div class="card mt-4">
            <div class="card-body">
              <h4 class="card-title"><i class="fa fa-fw fa-bolt"></i>Your Skills</h4>
              <ul class="list-group pb-3">

                @foreach ($skills as $skill)
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span id="skill_name">{{ $skill->name }}</span>
                  <span class="badge 
                  @if($skill->level == 'Average')
                  badge-primary 
                  @elseif($skill->level == 'Beginner')
                  badge-secondary 
                  @else
                  badge-success 
                  @endif
                  badge-pill
                  $skill->level
                  "
                  
                  id="skill_level">{{ $skill->level }}</span>
                </li>
                @endforeach

              </ul>

              <nav aria-label="skills_list">
                
                {{ $skills->links('pagination') }}
              </nav>
            </div>
          </div>

        </div>
      </div>
    </div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-pencil-square-o"></i> Edit Your Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
            <div class="form-group">
              <form method="POST" action="{{ route('users.update',[$user->email]) }}" >
                {{ csrf_field() }}

              <input type="hidden" name='_method' value="put">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
              <small id="emailHelp" class="form-text text-muted">You cannot change your email.</small>
            </div>

            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Full Name">
            </div>

            <div class="form-group">
              <label for="number">Phone</label>
              <input type="number" class="form-control" id="number" name="number" value="{{ $user->number }}" placeholder="Phone Number">
            </div>

            <div class="form-group">
              <label for="intro">Introduction</label>
              <textarea class="form-control" id="intro" name="intro" rows="3">{{$user->intro}}</textarea>
            </div>
            <hr>

            <div class="form-group">
              <h5 class="py-2"><i class="fa fa-lock"></i> Change Password</h5>
              <label for="password">New Password</label>
              <input  pattern=".{0}|.{8,}"  title="Please atleast 8 letters" type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
            </div>

            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input  pattern=".{0}|.{8,}" title="Please atleast 8 letters" type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-check"></i> Save Changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


@endsection
