@extends('layouts.master')

@section('content')
<div class="directory-content">
    
  <div class="welcome-message mb-4">
      <h2>{{ $title }}</h2>
      <p class="font-weight-light">{{ $service->name }}</p>
  </div>

  @if (session('notification'))
    @include('layouts.notification')
  @endif

  <div class="card">
    <form action="/directory/public/services/{{ $service->id }}/sections/{{ $section->id }}" method="post">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Section Name</label>
          <input type="text" class="form-control {{ $errors->first('name') ? ' is-invalid' : '' }}" value="{{ old('name', $section->name ) }}" id="name" name="name" placeholder="Section Name">
          @if( $errors->first('name') )
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="head">Section Head</label>
          <input type="text" class="form-control {{ $errors->first('head') ? ' is-invalid' : '' }}" value="{{ old('head', $section->head ) }}"  id="head" name="head" placeholder="Section Head">
          @if( $errors->first('head') )
            <div class="invalid-feedback">
              {{ $errors->first('head') }}
            </div>
          @endif
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="operating_hours">Operating Hours</label>
            <input type="text" class="form-control {{ $errors->first('operating_hours') ? ' is-invalid' : '' }}" value="{{ old('operating_hours', $section->operating_hours ) }}" id="operating_hours" name="operating_hours" placeholder="Operating Hours">
            @if( $errors->first('operating_hours') )
              <div class="invalid-feedback">
                {{ $errors->first('operating_hours') }}
              </div>
            @endif
          </div>
          <div class="form-group col">
            <label for="ext">Local Number(s)</label>
            <input type="text" class="form-control {{ $errors->first('ext') ? ' is-invalid' : '' }}" value="{{ old('ext',  $section->ext) }}" id="ext" name="ext" placeholder="Local Number(s)">
            @if( $errors->first('ext') )
              <div class="invalid-feedback">
                {{ $errors->first('ext') }}
              </div>
            @endif
          </div>          
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
