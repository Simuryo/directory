@extends('layouts.master')

@section('content')
<div class="directory-content">
    
  <div class="welcome-message mb-4">
      <h2>{{ $title }}</h2>
      <p class="font-weight-light">{{ $clinic->name }}</p>
  </div>

  @if (session('notification'))
    @include('layouts.notification')
  @endif

  <div class="card">
    <form action="{{ route('clinics.update', $clinic->id) }}" method="post">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Clinic Name</label>
          <input type="text" class="form-control {{ $errors->first('name') ? ' is-invalid' : '' }}" value="{{ old('name', $clinic->name) }}" id="name" name="name" placeholder="Clinic Name">
          @if( $errors->first('name') )
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="form-group ">
          <label for="ext">Local Extension(s)</label>
          <input type="text" class="form-control {{ $errors->first('ext') ? ' is-invalid' : '' }}" value="{{ old('ext', $clinic->ext) }}" id="ext" name="ext" placeholder="Local Extension(s)">
          @if( $errors->first('ext') )
            <div class="invalid-feedback">
              {{ $errors->first('ext') }}
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
