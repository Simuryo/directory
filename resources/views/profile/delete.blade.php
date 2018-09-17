@extends('layouts.master')

@section('content')

<div class="directory-content">
    
  <div class="welcome-message mb-4">
      <h2>{{ $title }}</h2>
      <p class="font-weight-light">Profile Entries</p>
  </div>

  @if (session('notification'))
    @include('layouts.notification')
  @endif

  <div class="card">
    <form action="{{ route('profile.destroy', $entry->id) }}" method="post">
      @method('DELETE ')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="password">Are you sure you want to delete this Profile Entry?</label>
          <p class="display-4 ml-3 text-center">"{{ $entry->description }}"</p>
          <input type="password" class="form-control {{ $errors->first('password') ? ' is-invalid' : '' }}" id="password" name="password" value="" placeholder="Enter Password">
          @if( $errors->first('password') )
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
          @endif
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ URL::previous() }}" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</a>
      </div>
    </form>

  </div>
</div>



@endsection
