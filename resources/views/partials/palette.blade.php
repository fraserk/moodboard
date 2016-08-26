<Color-Palette inline-template :colors="color">
  <input type="hidden" v-model="user" value="{{auth()->user()->id}}">
  <input type="hidden" v-model="moodboard" value="{{request()->moodboard->id}}">
  <input type="hidden" v-model="category" value="{{request()->category->id}}">
{{$category->name}}
<form class="" @submit.prevent="savePalette">
  <div class="form-group">
{{--{{$settings['0']->palette->detail ? $settings['0']->palette->detail : '' }}  --}}
    <input type="text" class="form-control" id="" v-model="palette.detail" value="" placeholder="" name="detail">
  </div>
  <div class="form-group " v-for="name in palette.color">
    <div class="row">

    <div class="col-sm-12">
      <label for="">Section name</label> <button v-on:click.stop="AddColorToSection(name)" class="btn btn-primary btn-sm"><i class="icon fa fa-plus-circle "> Add Colors</i></button>
      <input type="text" v-model="name.sectionsName" class="form-control" id="" placeholder="" name="kim">
          <div class="row">

            <div class="col-sm-3  "  v-for="color in name.child">
                <div class="addColor thumbnail " v-bind:style="{background:color.name}">

                </div>
              <input type="text" v-model="color.name" class="form-control">
            </div>
          </div>
    </div>
  </div>
  </div>
  <div class="form-group">
      <button v-on:click.stop="addEmptyColorSection" class="btn btn-sm btn-success"> <i class="icon fa fa-plus-circle" > Add Color Section</i></button>
  </div>
  <div class="form-group">

    <input type="submit" name="name" class="btn btn-sm btn-default" value="Submit">
  </div>
</form>
</Color-Palette>
