<div class="form-group">
    <label for="name">Name</label>
    <div class="form-group">
      <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
    </div>
    <label for="name">Name</label>
    <select class="form-control " style="width: 100%" name="governorate_id">

        @foreach ($governorates as $governorate)

        <option value="{{$governorate->id}}">{{$governorate->name}}</option>

        @endforeach
    </select>
    <div class="form-group">

    </div>

  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
    </div>


