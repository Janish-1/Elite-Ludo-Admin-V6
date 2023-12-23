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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tournaments as $key =>$result)
              <tr>
                <td><span class="font-weight-bold">{{ $tournaments->firstItem() + $key }}</span></td>
                <td>{{ $result->tournament_id }}</td>
                <td>{{ $result->tournament_name }}</td>
                <td>{{ $result->prize_pool }} <i class="las la-rupee-sign"></i></td>
                <td>{{ $result->player_type }}</td>
                <td>{{ $result->winner }} <i class="las la-users"></i></td>
                <td>{{ $result->time_start }}</td>
                <td>{{ $result->game_type }}</td>
                <td>{{ $result->entry_fee }}</td>
                <td>{{ $result->nooftables }}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu{{ $key }}" data-toggle="collapse" data-target="#collapseData{{ $key }}" aria-expanded="false" aria-controls="collapseData{{ $key }}">
                      v
                    </button>
                  </div>
                </td>
                <td>
                  <form method="POST" action="https://ludo.pujanpaath.com/api/tournament/delete?tournament_id={{ $result->tournament_id }}">
                    @csrf <!-- CSRF protection for POST requests -->
                    @method('DELETE') <!-- Method spoofing for DELETE request -->
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              <tr>
                <td colspan="11" class="p-0">
                  <div class="collapse" id="collapseData{{ $key }}">
                    <div class="card card-body">
                      <p>
                        <strong>Tournament ID:</strong> {{ $result->tournament_id }}<br>
                        <strong>Tournament Name:</strong> {{ $result->tournament_name }}<br>
                        <strong>Prize Pool:</strong> {{ $result->prize_pool }}<br>
                        <!-- Display other tournament details -->
                      </p>
                      <br>
                      <strong>Tables:</strong><br>

                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Table ID</th>
                            <th>Game Name</th>
                            <th>Player ID 1</th>
                            <th>Player ID 2</th>
                            <th>Player ID 3</th>
                            <th>Player ID 4</th>
                            <th>Winner</th>
                            <th>Status</th>
                            <th>Updated At</th>
                            <th>Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($result->tables as $key => $tables)
                          @foreach ($tables as $index => $table)
                          <tr>
                            <td>{{ $index + 1 }}</td>
                            <!-- Display table details -->
                            <!-- Example: -->
                            <td>{{ $table->table_id }}</td>
                            <td>{{ $table->game_name }}</td>
                            <td>{{ $table->player_id1 ?? 'N/A' }}</td>
                            <td>{{ $table->player_id2 ?? 'N/A' }}</td>
                            <td>{{ $table->player_id3 ?? 'N/A' }}</td>
                            <td>{{ $table->player_id4 ?? 'N/A' }}</td>
                            <td>{{ $table->winner ?? 'N/A' }}</td>
                            <td>{{ $table->status }}</td>
                            <td>{{ $table->updated_at }}</td>
                            <td>{{ $table->created_at }}</td>
                          </tr>
                          @endforeach
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="my-1">
        {{ $tournaments->onEachSide(3)->links('vendor.pagination.custom') }}
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