 @extends('layouts.app')
@section('page_title')
Create Governorate
@endsection
@section('small_title')

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

            <h3 class="card-title">create of Governorates</h3>

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
            <form action="{{url(route('governorate.update',$model->id))}}" method="post">
                @csrf
                @method('put')
                @include('governorates.form')
            </form>
            {{-- @include(flash::'success') --}}
            @include('layouts.partails.validation_errors')
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
