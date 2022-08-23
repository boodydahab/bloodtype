@extends('layouts.app')
@inject('client','App\Models\Client')
@inject('donation','App\Models\Donation_request')
@section('page_title')
Governorates
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
        </div> --}}
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fas fa-chart-line"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Donation Requests</span>
             <span class="info-box-number">{{$donation->count()}}</span>
          </div>
         </div>
        </div>
     </div>
        <!-- Default box -->

        <div class="card">

          <div class="card-header">

            <h3 class="card-title">List of Governorates</h3>

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
            @if(count($records))

            <div class="table-responsive">
                <table class="table table-borderd">
                    <thead>
                    <tr>#</tr>
                    <tr>Name</tr>
                    <tr>edit</tr>
                    <tr>Delete</tr>
                    </thead>

                    <tbody>
                        @foreach ($recordes as $record)

                            <tr>
                                <td>
                                {{$loop->iteration}}
                                </td>
                                <td>
                                {{$record->Name}}
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
