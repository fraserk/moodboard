@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-sm-12">

    <div class="row">
      <div class="col-sm-3  ">
        <div class="thumbnail">
          <strong>  +  Create new MoodBoard </strong>
          <hr >
          <form class="" action="{{route('user.moodboard.store',auth()->user())}}" method="post" class="form-horizontal">
            {!!csrf_field()!!}
            <div class="form-group">
              <input type="text" name="name" value="" placeholder="Moodboard Name" class="form-control">
            </div>
            <div class="form-group">

              <input type="submit"  class="btn btn-primary btn-xs" value="Create">
            </div>
          </form>
        </div>

      </div>
      {{--End of create new moodboard  --}}
      @forelse($moodboards as $moodboard)
        <div class="col-sm-3  ">
          <div class="thumbnail">
            Name: <a href="{{route('user.moodboard.show',[auth()->user(),$moodboard->id])}}">{{$moodboard->name}}</a>
          </div>

        </div>

      @empty
        <p>
          You do not have any moodboard,  why not create one..
        </p>

      @endforelse

    </div>
  </div>
</div>
</div>
@endsection
