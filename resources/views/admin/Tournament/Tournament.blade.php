@extends('admin.layout.master')
@section('title')
All Tournament List
@endsection
@section('css')
<!--  link custom css link here -->
@endsection
@section('content')
<!-- BEGIN: Content-->
<div class="row">
  <!-- Bootstrap Validation -->
  <div class="col-md-12 col-12">
    <div class="card">
      <div class="card-header">
        <p class="card-title"><i class="las la-sliders-h"></i> All Tournament List</p>
        <a href="{{url('/')}}/admin/tournament/add"><button class="btn btn-orange border-0 round"><i class="las la-plus-circle"></i> Add New Tournament</button></a>
      </div>
      @if(session()->get('error'))
      <div class="alert alert-danger alert-dismissible ml-1 mr-1" id="notice_msg" role="alert">
        <div class="alert-body">
          <b>{{session()->get('error')}}</b>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @elseif(session()->get('success'))
      <div class="alert alert-success alert-dismissible ml-1 mr-1" id="success_msg" role="alert">
        <div class="alert-body">
          <b>{{session()->get('success')}}</b>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Tournament Id</th>
                <th>Tournament Title</th>
                <th>Prize Pool</th>
                <th>Player Type</th>
                <th>Winner</th>
                <th>time Start</th>
                <th>Game Type</th>
                <th>Entry Fee</th>
                <th>No of Tables</th>
                <th>Tournament Details</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $key =>$result)
              <tr>
                <td><span class="font-weight-bold">{{ $data->firstItem() + $key }}</span></td>
                <td>{{ $result-> tournament_id }}</td>
                <td>{{ $result-> tournament_name }}</td>
                <td>{{ $result-> prize_pool }} <i class="las la-rupee-sign"></i></td>
                <td>{{ $result-> player_type }}</td>
                <td>{{ $result-> winner }} <i class="las la-users"></i></td>
                <td>{{ $result-> time_start }}</td>
                <td>{{ $result-> game_type }}</td>
                <td>{{ $result-> entry_fee }}</td>
                <td>{{ $result-> nooftables }}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu{{ $key }}" data-toggle="collapse" data-target="#collapseData{{ $key }}" aria-expanded="false" aria-controls="collapseData{{ $key }}">
                      v
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="10" class="p-0">
                  <div class="collapse" id="collapseData{{ $key }}">
                    <div class="card card-body">
                      Some Data
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="my-1">
          {{ $data->onEachSide(3)->links('vendor.pagination.custom') }}
        </div>
      </div>
    </div>
  </div>
  <!-- /Bootstrap Validation -->
</div>

<!-- END: Content-->
@endsection
@section('js')
@endsection