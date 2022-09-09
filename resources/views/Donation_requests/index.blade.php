@extends('layouts.app')
@section('page_title')
Donations
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

<h3 class="card-title">List of Donations</h3>

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
{{-- <a href="{{ url(route('donation.create')) }} "class="btn btn-primary"><i class="fa fa-plus"></i> New
    Donation</a> --}}
@include('flash::message')
@if (count($records))
<div class="table-responsive">
<table class="table table-bordered">
<thead>
    <th>Name</th>
    <th>Age</th>
    <th>Phone</th>
    <th>Hospital</th>
    <th>Address</th>
    <th>Bags</th>
    <th>Details</th>
    <th>City</th>
    <th>Blood Type</th>
    <th>Client</th>
   <th >Delete</th>
</thead>

<tbody>

@foreach ($records as $record)
<tr>


<td>
{{ $record->patient_name }}
</td>
<td>
{{ $record->patient_age }}
</td>
<td>
{{ $record->patient_phone }}
</td>
<td>
{{ $record->hospital_name }}
</td>
<td>
{{ $record->hospital_address }}
</td>
<td>
{{ $record->bags_num }}
</td>
<td>
{{ $record->details }}
</td>
<td>
{{ $record->city->name }}
</td>
<td>
{{ $record->bloodType->name }}
</td>
<td>
{{ $record->client->name }}
</td>


<td class="text-right">
<form action="{{ route('donation.destroy', $record->id) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>delete</button>
</form>
</td>

</tr>
@endforeach
</tbody>
</table>
</div>
@else
<div class="alert alert-danger" role="alert">
NO data
</div>
@endif
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
