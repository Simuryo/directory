


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
    <form action="{{ route('contacts.update', $service->id) }}" method="post">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control {{ $errors->first('address') ? ' is-invalid' : '' }}" value="{{ old('address', $service->contacts['address']) }}" id="address" name="address" placeholder="Address">
          @if( $errors->first('address') )
            <div class="invalid-feedback">
              {{ $errors->first('address') }}
            </div>
          @endif
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="contact_person">Contact Person</label>
            <input type="text" class="form-control {{ $errors->first('contact_person') ? ' is-invalid' : '' }}" value="{{ old('contact_person', $service->contacts['contact_person']) }}" id="contact_person" name="contact_person" placeholder="Contact Person">
            @if( $errors->first('contact_person') )
              <div class="invalid-feedback">
                {{ $errors->first('contact_person') }}
              </div>
            @endif
          </div>
          <div class="form-group col">
            <label for="position">Position</label>
            <input type="text" class="form-control {{ $errors->first('position') ? ' is-invalid' : '' }}" value="{{ old('position', $service->contacts['position']) }}" id="position" name="position" placeholder="Position">
            @if( $errors->first('position') )
              <div class="invalid-feedback">
                {{ $errors->first('position') }}
              </div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="telephone">Telephone</label>
            <input type="text" class="form-control {{ $errors->first('telephone') ? ' is-invalid' : '' }}" value="{{ old('telephone', $service->contacts['telephone']) }}"  id="telephone" name="telephone" placeholder="Telephone">
            @if( $errors->first('telephone') )
              <div class="invalid-feedback">
                {{ $errors->first('telephone') }}
              </div>
            @endif
          </div>
          <div class="form-group col">
            <label for="email">Email</label>
            <input type="text" class="form-control {{ $errors->first('email') ? ' is-invalid' : '' }}" value="{{ old('email', $service->contacts['email']) }}" id="email" name="email" placeholder="Email">
            @if( $errors->first('email') )
              <div class="invalid-feedback">
                {{ $errors->first('email') }}
              </div>
            @endif
          </div>          
        </div>

      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/directory/public/services/{{ $service->id }}" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</a>
      </div>
        
    </form>

  </div>
</div>



@endsection
