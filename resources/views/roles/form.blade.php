@inject('perm', 'App\Models\permission')

<div class="form-group">
    <label for="name">Name</label>
    <div class="form-group">
        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
    </div>
</div>
<div class="form-group">
    <label for="name">permission</label><br>
    <input id="select-all" name="all" type="checkbox">
    <label for="all">Select all</label>
    <div class="row">
        @foreach ($perm->all() as $permission)
            <div class="col-sm-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" data-in="role" id="flexCheckDefault"
                        name="permissions[]">{{ $permission->name }}
                    {{-- value="{{$permission->id}}"
                @if ($model->hasPermission($permission->id))

                @endif --}}
                    <label class="form-check-label" for="flexCheckDefault">
                    </label>
                </div>
            </div>
        @endforeach
    </div>

</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
@push('scripts')
    <script>

// alert(11);
        $("#select-all").on("change", function() {
            console.log('te')
            $('input[data-in="role"]').prop('checked', $(this).prop('checked'));
        });
    </script>
@endpush
</div>
