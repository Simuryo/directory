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
    <form action="{{ route('profile.update', $entry->id) }}" method="post">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="profile_entry">Profile Entry</label>
          <input type="text" class="form-control" id="profile_entry" name="profile_entry" value="{{ old('profile_entry', $entry->description) }}" placeholder="Entry">
          @if( $errors->first('profile_entry') )
            <div class="invalid-feedback">
              {{ $errors->first('profile_entry') }}
            </div>
          @endif
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ URL::previous() }}" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</a>
      </div>
    </form>

  </div>
</div>



@endsection
