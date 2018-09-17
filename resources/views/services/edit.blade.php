@extends('layouts.master')

@section('content')
<div class="directory-content">
    
  <div class="welcome-message mb-4">
      <h2>{{ $title }}</h2>
      <p class="font-weight-light">{{ $service->name}}</p>
  </div>

  @if (session('notification'))
    @include('layouts.notification')
  @endif

  <div class="card">
    <form action="{{ route('services.update', $service->id) }}" method="post">
      @method('PUT')
      @csrf
      <div class="card-body">
      
        <div class="form-group">
          <label for="name">Service Name</label>
          <input type="text" class="form-control {{ $errors->first('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ old('name', $service->name) }}" placeholder="Service Name">
          @if( $errors->first('name') )
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="head">Head</label>
          <input type="text" class="form-control {{ $errors->first('head') ? ' is-invalid' : '' }}" id="head" name="head" value="{{ old('head', $service->head) }}" placeholder="Head">
          @if( $errors->first('head') )
            <div class="invalid-feedback">
              {{ $errors->first('head') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="position">Position</label>
          <input type="text" class="form-control {{ $errors->first('position') ? ' is-invalid' : '' }}" id="position" name="position" value="{{ old('position', $service->position) }}" placeholder="Position">
          @if( $errors->first('position') )
            <div class="invalid-feedback">
              {{ $errors->first('position') }}
            </div>
          @endif
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/directory/public/services/{{ $service->id }}" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</a>
      </div>
    </form>

  </div>
</div>



@endsection
