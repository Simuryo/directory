@extends('layouts.master')

@section('content')
<div class="directory-content">
    <div class="float-right mb-4">
      <a href="/directory/public/clinics" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>
    <div class="welcome-message mb-4">
        <h2>{{ $title }}</h2>
        <span class="font-weight-light">Clinic Schedule </span>
        @auth
          <p class="font-weight-light">{{ $clinic->ext }} <a href="{{ URL::current() }}/edit" class="badge badge-warning">Edit</a></p>
        @endauth

    </div>

    @if (session('notification'))
      @include('layouts.notification')
    @endif

    <div class="row">

      <div class="col-md-12">
        @auth
          <div class="card mb-3">
            <div class="card-body">
              <a href="/directory/public/clinics/{{ $clinic->id }}/sections/create" class="btn btn-success float-right">Add Clinic Section</a>
            </div>
          </div>
        @endauth

        @if( count($clinic->sections) )
          <div class="list-group">
            @foreach( $clinic->sections as $section)
              <div  class="list-group-item flex-column">
                <div class="d-flex w-100 justify-content-between mb-2">
                  <h4 class="mb-0">
                    {{ $section->name }} 
                    @auth
                      <small>
                        <span class="font-weight-light">
                          <a href="/directory/public/clinics/{{ $clinic->id }}/sections/{{ $section->id }}/edit" class="badge badge-secondary ">
                            Edit
                          </a>
                        </span>
                      </small>
                    @endauth
                  </h4>
                  @auth
                    <a href="/directory/public/clinics/{{ $clinic->id }}/sections/{{ $section->id }}/schedules/create" class="btn btn-outline-success btn-sm float-right">Add Schedule</a>
                  @endauth
                </div>
                @if( count ( $section->schedules ) )
                  @foreach( $section->schedules as $schedule )
                    <div class="row ml-3 mb-0">
                      <div class="col-sm-3">
                        @auth
                          <a href="/directory/public/clinics/{{ $clinic->id }}/sections/{{ $section->id }}/schedules/{{ $schedule->id }}/edit">
                            <i class="fa fa-edit text-muted"></i>
                          </a>
                        @endauth
                         {{ $schedule->title }}
                       </div>
                      <div class="col-sm-9">
                        <p class="mb-0">{{ $schedule->operating_hours }}</p>
                      </div>
                    </div>
                  @endforeach
                @else
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> No available schedule for this section. Kindly add a new one.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
              </div>
            @endforeach
          </div>           
        @else
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> No available section on this Clinic. Kindly add a new one.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      </div>
    </div>

@endsection
