
@inject('perm', 'App\Models\Permission' )
<div class="form-group">
    <label for="name">Name</label>
    <div class="form-group">
      <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
    </div>
  </div>
<div class="form-group">
    <label for="name">Description</label>
    <div class="form-group">
      <input type="textarea" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
    </div>
  </div>
<div class="form-group">
    <label for="name">permission</label>
    <div class="row">
        @foreach ($perm->all() as $permission )
            <div class="col-sm-3">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="permission_list" id="flexCheckChecked" checked/>
                    {{$permission->display_name}}
                    <label class="form-check-label" for="flexCheckChecked">Checked checkbox</label>
                  </div>

            </div>
        @endforeach
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
    </div>


