@extends('layouts.master')

@section('content')
<div class="directory-content">
    <div class="float-right mb-4">
      <a href="/directory/public/rates" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>
    <div class="welcome-message mb-4">
        <h2>
          {{ $title }}
          @auth
            <small><a href="{{ URL::current() }}/edit" class="badge badge-warning">Edit</a></small>
          @endauth
        </h2>
        <span class="font-weight-light"><a href="/directory/public/rates"> Service Rates</a></span>

    </div>

    @if (session('notification'))
      @include('layouts.notification')
    @endif

    <div class="row">

      <div class="col-md-12">
        @auth
          <div class="card mb-3">
            <div class="card-body">
              <a href="/directory/public/rates/radiology/sections/create" class="btn btn-success float-right">Add  Section</a>
            </div>
          </div>
        @endauth

        @if( count($radiology_sections) )
          <div class="row">
            @foreach( $radiology_sections as $section )
              <div class="col-md-6 mb-3">
                <div class="card">
                  <div class="card-header">
                    {{$section->name}}
                    @auth
                      <a href="/directory/public/rates/radiology/sections/{{ $section->code }}/entries/create" class="btn btn-outline-success btn-sm float-right">Add Entry</a>
                    @endauth
                  </div>
                  <div class="card-body">
                    @if( count($section->entries) )
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <th>{{ $section->column_1 }}</th>
                            <th>{{ $section->column_2 }}</th>
                            <th>{{ $section->column_3 }}</th>
                          </thead>
                          <tbody>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                          </tbody>
                        </table>
                      </div>
                    @else
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> No available entry for this Radioloy Section. Kindly add a new one.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                  </div>
                </div>
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
