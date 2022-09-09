@extends('layouts.app')
@section('page_title')
Roles
@endsection
@section('small_title')
test
@endsection

@section('content')


<section class="content">
{{-- <div class="row">
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">Clients</span>
<span class="info-box-number">{{$client->count()}}</span>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-green"><i class="fas fa-chart-line"></i></span>
<div class="info-box-content">
<span class="info-box-text">Donation Requests</span>
<span class="info-box-number">{{$donation->count()}}</span>
</div>
</div>
</div>
</div> --}}
<!-- Default box -->

<div class="card">

<div class="card-header">

<h3 class="card-title">List of roles</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body">
<a href="{{ url(route('role.create')) }} "class="btn btn-primary"><i class="fa fa-plus"></i> New
    Role</a>
@include('flash::message')
{{-- @if (count($records)) --}}
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<th>#</th>
<th class="text-center">Name</th>
<th class="text-center">Edit</th>
<th class="text-center">Delete</th>
</thead>

<tbody>

@foreach ($records as $record)
<tr>

<td>
{{ $loop->iteration }}
</td>
<td>
{{ $record->name }}
</td>
<td>
{{ $record->display_name }}
</td>
<td class="text-right">
<a href="{{ url(route('role.edit', $record->id)) }}"
    class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
</td>
<td class="text-right">
<form action="{{ url(route('role.destroy', $record->id)) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-xs"><i
            class="fa fa-trash"></i></button>
</form>
</td>

</tr>
@endforeach
</tbody>
</table>
</div>
{{-- @else --}}
{{-- <div class="alert alert-danger" role="alert">
NO data
</div> --}}
{{-- @endif --}}
</div>
<!-- /.card-body -->

<!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
</div>
<!-- Main content -->

<!-- /.content -->

</div>
@endsection
