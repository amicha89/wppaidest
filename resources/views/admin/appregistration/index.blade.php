@extends('admin.layouts.master')
@section('title', 'Registration')

@section('head_style')
    <!-- dataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/DataTables_latest/DataTables-1.10.18/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/DataTables_latest/Responsive-2.2.2/css/responsive.dataTables.min.css') }}">
@endsection

@section('page_content')
    <div class="box box-default">
        <div class="box-body">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="top-bar-title padding-bottom pull-left">Applications</div>
                </div>

                <div>
                  <!-- {{url(\Config::get('adminPrefix').'/users/create')}} -->
                    @if(Common::has_permission(\Auth::guard('admin')->user()->id, 'add_user'))
                        <a href="{{url(\Config::get('adminPrefix').'/app-registrations/create')}} " class="btn btn-theme"><span class="fa fa-plus"> &nbsp;</span>Add Application</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

  <div class="box">
    <div class="box-body">
      <div class="row">
        <div class="col-12">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="table-responsive">
                       {!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('extra_body_scripts')

<!-- jquery.dataTables js -->
<script src="{{ asset('public/backend/DataTables_latest/DataTables-1.10.18/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/backend/DataTables_latest/Responsive-2.2.2/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>


{!! $dataTable->scripts() !!}
<script type="text/javascript">
</script>
@endpush