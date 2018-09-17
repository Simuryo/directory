@extends('layouts.master')

@section('content')
<div class="directory-content">
    
    <div class="welcome-message mb-4">
        @auth
          <span class="mt-2 float-right">
            <a href="services/create" class="btn btn-primary float-right">
              Add Service
            </a>
          </span>
        @endauth
        <h2>{{ $title }}</h2>
        <p class="font-weight-light">BRTTH, Road to Total Health Care</p>
    </div>

    @if (session('notification'))
      @include('layouts.notification')
    @endif

    @if( $services->count() > 0 )
      
        <div class="row">
          @foreach( $services as $service )
            <div class="col-md-4  mb-3">
              <div class="card ">
                <div class="card-body">
                  <h5 class="card-title"><a href="services/{{ $service->id }}">{{ $service->name}}</a></h5>
                  <hr>
                  <h6 class="card-subtitle mb-2">{{ $service->head}}</h6>
                  <h6 class="card-subtitle text-muted mb-3">{{ $service->position}}</h6>
                  @if( !is_null($service->contacts) )
                    <small>
                      <p class="card-text hide"><i class="fa fa-phone"></i> {{ $service->contacts['telephone'] }} </p>
                      <p class="card-text hide"><i class="fa fa-envelope"></i> {{ $service->contacts['email'] }} </p>
                    </small>
                  @endif
                
                </div>
                <div class="card-footer text-white bg-success">
                  <a class="btn btn-outline btn-block" href="services/{{ $service->id }}"> Read More</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      
    @else
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> No available services. Kindly add a new one.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif 



@endsection
