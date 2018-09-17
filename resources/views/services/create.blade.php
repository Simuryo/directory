@extends('layouts.master')

@section('content')
<div class="directory-content">
    
  <div class="welcome-message mb-4">
      <h2>{{ $title }}</h2>
      <p class="font-weight-light">BRTTH, Road to Total Health Care</p>
  </div>

  @if (session('notification'))
    @include('layouts.notification')
  @endif

  <div class="card">
    <form action="{{ route('services.store') }}" method="post">
      {{ csrf_field() }}
      <div class="card-body">
      
        <div class="form-group">
          <label for="name">Service Name</label>
          <input type="text" class="form-control {{ $errors->first('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" id="name" name="name" placeholder="Service Name">
          @if( $errors->first('name') )
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="head">Head</label>
          <input type="text" class="form-control {{ $errors->first('head') ? ' is-invalid' : '' }}" value="{{ old('head') }}" id="head" name="head" placeholder="Head">
          @if( $errors->first('head') )
            <div class="invalid-feedback">
              {{ $errors->first('head') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="position">Position</label>
          <input type="text" class="form-control {{ $errors->first('position') ? ' is-invalid' : '' }}" value="{{ old('position') }}" id="position" name="position" placeholder="Position">
          @if( $errors->first('position') )
            <div class="invalid-feedback">
              {{ $errors->first('position') }}
            </div>
          @endif
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <a href="/directory/public/services" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</a>
      </div>
    </form>

  </div>
</div>



@endsection
