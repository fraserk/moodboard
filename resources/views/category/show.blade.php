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
          {{$category->name}}
          <form class="" action="{{route('user.moodboard.category.update',[auth()->user(),$moodboard, $category])}}" method="post">
            {!!csrf_field()!!}
            {!! method_field('patch') !!}
            <div class="form-group">

              <input type="text" class="form-control" id="" value="{{$settings['0']? $settings['0']->detail : '' }}" placeholder="" name="detail">
            </div>
            <div class="form-group">

              <input type="submit" class="btn btn-sm btn-default" value="Submit">

            </div>
          </form>

        </div>
      </div>

    </div>
  @endsection
