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
          @if ($category->name == 'Color Palette')
            @include('partials.palette')
          @elseif($category->name == 'Typography')
            <Typography inline-template :types ="type">
              test
              <hr>
              <select class="form-control" name=""  V-model="font" @change="loadfont(font)">
                <option value="" selected>Select</option>
                <option v-for="font in googleFonts" :value="font.family" >
                  @{{font.family}}
                </option>

              </select>
              @{{selectedfont | json}}
            <textarea name="name" rows="8" cols="40" class="form-control">The Brown fox jump over the mooon</textarea>
              {{-- <script>
               console.log(selectedfont});
                WebFont.load({
                  google: {
                    families: [font]
                  }
                });
              </script> --}}

            </Typography>
          @endif

        </div>
      </div>

    </div>

  @endsection
