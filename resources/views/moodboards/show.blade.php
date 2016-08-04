@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          Project Name : {{$moodboard->name}}
          <hr>
        </div>
      </div>
        <div class="row">
          <div class="col-sm-2">

            @include('partials.sidenav')
          </div>
          <div class="col-sm-10">
            
          </div>
        </div>

    </div>
  @endsection
