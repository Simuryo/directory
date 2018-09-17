@extends('layouts.master')

@section('content')
<div class="directory-content">
    
    <div class="welcome-message mb-4">
        <h2>{{ $title }}</h2>
        <p class="font-weight-light">BRTTH, Road to Total Health Care. Serving the Bicolanos with a heart.</p>
    </div>
    @if (session('notification'))
      @include('layouts.notification')
    @endif

    @auth
      <div class="card mb-3">
        <div class="card-body">
          <form action="{{ route('profile.store') }}" method="post">
            {{ csrf_field() }}
            <div class="input-group input-group-lg">
              <input type="text" name="profile_entry" class="form-control {{ $errors->first('profile_entry') ? ' is-invalid' : '' }}" value="{{ old('profile_entry') }}" placeholder="Add Profile Entry" aria-label="Add Profile Entry" aria-describedby="btn-submit-profile-entry" required>
              <div class="input-group-append">
                <button class="btn btn-success" type="submit" id="btn-submit-profile-entry"><i class="fa fa-plus"></i> Add</button>
              </div>
              @if( $errors->first('profile_entry') )
                <div class="invalid-feedback">
                  {{ $errors->first('profile_entry') }}
                </div>
              @endif
            </div>
          </form>
        </div>
      </div>
    @endauth

    <ul class="list-group list-group-flush">
      @if( $profile_entries->count() > 0)
        @foreach( $profile_entries as $entry)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{ $entry->description}}
          @auth
            <span class="profile-control pull-right">
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="profile/{{ $entry->id }}/edit" class="btn btn-warning btn-sm"><span class="d-none.d-md-block.d-xs-none"></span> <i class="fa fa-edit"></i></a>
                <a href="profile/{{ $entry->id }}/delete" class="btn btn-danger btn-sm"><span class="d-none.d-md-block.d-xs-none"></span> <i class="fa fa-trash"></i></a>
              </div>
            </span>
          @endauth
        </li>
        @endforeach
      @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>No profile entry available.</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    </ul>
@endsection
