@extends('layouts.master')

@section('content')
<div class="directory-content">
    <div class="float-right mb-4">
      <a href="/directory/public/services" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>
    <div class="welcome-message mb-4">
        <h2>{{ $title }}</h2>
        <p class="font-weight-light"><strong>{{ $service->head }}</strong> - {{ $service->position }} @auth <a href="{{ URL::current() }}/edit" class="badge badge-warning">Edit</a>@endauth</p>
    </div>

    @if (session('notification'))
      @include('layouts.notification')
    @endif

    <div class="row">

      <div class="col-md-8 col-sm-12 mb-3">
        @auth
          <div class="card mb-3">
            <div class="card-body">
              <a href="/directory/public/services/{{ $service->id }}/sections/create" class="btn btn-success float-right">Add Section</a>
            </div>
          </div>
        @endauth
        @if( $service->sections->count() > 0 )
          <div class="table-responsive bg-white">
            <table class="table mb-0">
              <thead class="thead-light">
                <th>SECTION</th>
                <th>OPERATING HOURS</th>
                <th>SECTION HEAD</th>
                <th>LOCAL NUMBER</th>
                @auth
                  <th>ACTION</th>
                @endauth
              </thead>
              <tbody>
                @foreach( $service->sections as $section)
                  <tr>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->operating_hours }}</td>
                    <td>{{ $section->head }}</td>
                    <td>{{ $section->ext }}</td>
                    @auth
                       <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="/directory/public/services/{{ $service->id }}/sections/{{ $section->id }}/edit" class="btn btn-warning">Edit</a>
                          <!-- <a href="" class="btn btn-danger">Delete</a>  -->
                        </div>
                      </td>
                    @endauth 
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
            
        @else
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> No available section on this service. Kindly add a new one.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      </div>
      <div class="col-md-4 col-sm-12 mb-3">
        <div class="card">
          <div class="card-header">
            Contact Information
            @auth
              @if(  !is_null($service->contacts) )
                <a href="/directory/public/services/{{ $service->id }}/contacts/edit" class="btn btn-warning btn-sm float-right">Edit Contacts</a>
              @else
                <a href="/directory/public/services/{{ $service->id }}/contacts/create" class="btn btn-success btn-sm float-right">Add Contacts</a>
              @endif
            @endauth
          </div>
          <div class="card-body">
            @if(  !is_null($service->contacts) )
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa fa-map"></i> Address: <p>{{ $service->contacts['address'] }}</p></li>
                <li class="list-group-item"><i class="fa fa-phone"></i> Telephone: <p>{{ $service->contacts['telephone'] }}</p></li>
                <li class="list-group-item"><i class="fa fa-user"></i> Contact Person: <p>{{ $service->contacts['contact_person'] }} - {{ $service->contacts['position'] }}</p></li>
                <li class="list-group-item"><i class="fa fa-envelope"></i> Email: <p>{{ $service->contacts['email'] }}</p></li>
              </ul>
            @else
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> No available contact fpr this service. Kindly add a new one.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>

@endsection
