<div class="panel panel-default">
  {{-- <div class="panel-heading">
    <h3 class="panel-title">Category</h3>
  </div> --}}
  <div class="panel-body">
    <div class="spark-settings-tabs">
        <ul class="nav spark-settings-stacked-tabs" >
          @foreach($moodboard->categories as $category)

          <li role="presentation" class="">
              <a href="{{route('user.moodboard.category.show',[auth()->user(),$moodboard,$category])}}" >
                   {{$category->name}}
                   <span class="fa fa-chevron-right  pull-right"></span>
              </a>
          </li>
        @endforeach

          {{-- <li role="presentation" class="{{Active::check('recipes',true)}}">
              <a href="{{}}">
                  <i class="fa fa-fw fa-btn fa-list-ol"></i>Recipes
              </a>
          </li> --}}
        </ul>
    </div>
  </div>
</div>
