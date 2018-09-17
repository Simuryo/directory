@extends('layouts.master')

@section('content')
<div class="directory-content">
    
  <div class="welcome-message mb-4">
      <h2>{{ $title }}</h2>
      <p class="font-weight-light"> <a href="/directory/public/rates/radiology"><< Radiology Service Rates</a> </p>
  </div>

  @if (session('notification'))
    @include('layouts.notification')
  @endif

  <div class="card">
    <form action="{{ route('rates.radiology.sections.store') }}" method="post">
      {{ csrf_field() }}
      <div class="card-body">
        <div class="row">
          <div class="form-group col-md-9">
            <label for="name">Section Name</label>
            <input type="text" class="form-control {{ $errors->first('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" id="name" name="name" placeholder="Clinic Name">
            @if( $errors->first('name') )
              <div class="invalid-feedback">
                {{ $errors->first('name') }}
              </div>
            @endif
          </div>
          <div class="form-group col-md-3">
            <label for="code">Section Code</label>
            <input type="text" class="form-control {{ $errors->first('code') ? ' is-invalid' : '' }}" value="{{ old('code') }}" id="code" name="code" placeholder="Clinic Name">
            @if( $errors->first('code') )
              <div class="invalid-feedback">
                {{ $errors->first('code') }}
              </div>
            @endif
          </div>
        </div>
          
        <div class="row">
          <div class="col">
            <div class="form-group ">
              <label for="column_1">Column Name 1</label>
              <input type="text" class="form-control {{ $errors->first('column_1') ? ' is-invalid' : '' }}" value="{{ old('column_1') }}" id="column_1" name="column_1" placeholder="Column Name">
              @if( $errors->first('column_1') )
                <div class="invalid-feedback">
                  {{ $errors->first('column_1') }}
                </div>
              @endif
            </div>
          </div>
          <div class="col">
            <div class="form-group ">
              <label for="column_2">Column Name 3</label>
              <input type="text" class="form-control {{ $errors->first('column_2') ? ' is-invalid' : '' }}" value="{{ old('column_2') }}" id="column_2" name="column_2" placeholder="Column Name">
              @if( $errors->first('column_2') )
                <div class="invalid-feedback">
                  {{ $errors->first('column_2') }}
                </div>
              @endif
            </div>
          </div>
          <div class="col">
            <div class="form-group ">
              <label for="column_3">Column Name 3</label>
              <input type="text" class="form-control {{ $errors->first('column_3') ? ' is-invalid' : '' }}" value="{{ old('column_3') }}" id="column_3" name="column_3" placeholder="Column Name">
              @if( $errors->first('column_3') )
                <div class="invalid-feedback">
                  {{ $errors->first('column_3') }}
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <a href="/directory/public/rates" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</a>
      </div>
        
    </form>

  </div>
</div>



@endsection
