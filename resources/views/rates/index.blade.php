@extends('layouts.master')

@section('content')
<div class="directory-content">
    
    <div class="welcome-message mb-4">
        @auth
          <span class="mt-2 float-right">
            <a href="rates/create" class="btn btn-primary float-right">
              Add Rate Directory
            </a>
          </span>
        @endauth
        <h2>{{ $title }}</h2>
        <p class="font-weight-light">BRTTH, Road to Total Health Care</p>
    </div>

    @if (session('notification'))
      @include('layouts.notification')
    @endif

    @if( $rates->count() > 0 )
      
        <div class="row mb-3">
          @foreach( $rates as $rate )
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="action-controls float-right">
                    <a href="/directory/public/rates/{{ $rate->code }}/edit"><i class="fa fa-edit text-muted"></i></a>
                  </div>
                  <div class="card-block text-center">
                    <h4 class="card-title"><a href="rates/{{ $rate->code }}">{{ $rate->name}}</a></h4>
                    <h2 class="text-muted"><i class="{{ $rate->icon}} fa-3x"></i></h2>
                  </div>              
                </div>
                <div class="card-footer">
                  <a class="btn btn-outline btn-block" href="rates/{{ $rate->code }}"> See Rates</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      
    @else
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> No available Rate Directory. Kindly add a new one.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif 



@endsection
