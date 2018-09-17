@extends('layouts.master')

@section('content')
<div class="directory-content">
    
    <div class="welcome-message mb-4">
        @auth
          <span class="mt-2 float-right">
            <a href="clinics/create" class="btn btn-success float-right">
              Add Clinic
            </a>
          </span>
        @endauth
        <h2>{{ $title }}</h2>
        <p class="font-weight-light">BRTTH, Road to Total Health Care</p>
    </div>

    @if (session('notification'))
      @include('layouts.notification')
    @endif

    @if( $clinics->count() > 0 )
      
        <div class="row ">
          @foreach( $clinics as $clinic )
            <div class="col-md-4 col-sm-6 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><a href="clinics/{{ $clinic->id }}">{{ $clinic->name}}</a></h5>
                  <small>
                    <p class="card-text hide"><i class="fa fa-phone"></i> {{ $clinic->ext }} </p>
                  </small>
                
                </div>
                <div class="card-footer">
                  <a class="btn btn-outline btn-block" href="clinics/{{ $clinic->id }}">See Schedule</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      
    @else
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> No available clinics. Kindly add a new one.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif 



@endsection
