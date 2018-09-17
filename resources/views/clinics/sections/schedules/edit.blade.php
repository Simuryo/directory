@extends('layouts.master')

@section('content')
<div class="directory-content">
    
  <div class="welcome-message mb-4">
      <h2>{{ $title }}</h2>
      <p class="font-weight-light">{{ $clinic->name }} - {{ $section->name }}</p>
  </div>

  @if (session('notification'))
    @include('layouts.notification')
  @endif

  <div class="card">
    <form action="{{ route('clinics.sections.schedules.update', [ $clinic->id, $section->id, $schedule->id ] ) }}" method="post">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control {{ $errors->first('title') ? ' is-invalid' : '' }}" value="{{ old('title', $schedule->title) }}" id="title" name="title" placeholder="Section Name">
          @if( $errors->first('title') )
            <div class="invalid-feedback">
              {{ $errors->first('title') }}
            </div>
          @endif
        </div>
        <div class="form-group">
            <label for="operating_hours">Operating Hours</label>
            <input type="text" class="form-control {{ $errors->first('operating_hours') ? ' is-invalid' : '' }}" value="{{ old('operating_hours', $schedule->operating_hours) }}" id="operating_hours" name="operating_hours" placeholder="Operating Hours">
            @if( $errors->first('operating_hours') )
              <div class="invalid-feedback">
                {{ $errors->first('operating_hours') }}
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


