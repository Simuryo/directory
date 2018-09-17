@extends('layouts.master')

@section('content')
<div class="directory-content">
    
  <div class="welcome-message mb-4">
      <h2>{{ $title }}</h2>
      <p class="font-weight-light">Service Rates</p>
  </div>

  @if (session('notification'))
    @include('layouts.notification')
  @endif

  <div class="card">
    <form action="{{ route('rates.update', $rate->code) }}" method="post">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Rate Directory Name</label>
          <input type="text" class="form-control {{ $errors->first('name') ? ' is-invalid' : '' }}" value="{{ old('name', $rate->name) }}" id="name" name="name" placeholder="Service Name">
          @if( $errors->first('name') )
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="code">Code</label>
            <input type="text" class="form-control {{ $errors->first('code') ? ' is-invalid' : '' }}"  value="{{ old('code', $rate->code) }}" id="code" name="code" placeholder="Service Code" disabled="disabled">
            @if( $errors->first('code') )
              <div class="invalid-feedback">
                {{ $errors->first('code') }}
              </div>
            @endif
          </div>
          <div class="form-group col">
            <label for="icon">Icon</label>
            <input type="text" class="form-control {{ $errors->first('icon') ? ' is-invalid' : '' }}"  value="{{ old('icon', $rate->icon) }}" id="icon" name="icon" placeholder="Service Icon">
            @if( $errors->first('icon') )
              <div class="invalid-feedback">
                {{ $errors->first('icon') }}
              </div>
            @endif
          </div>
        </div>
        
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/directory/public/rates/radiology" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</a>
      </div>
    </form>

  </div>
</div>



@endsection
