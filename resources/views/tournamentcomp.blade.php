@extends('admin.layout.master')
@section('title')
Ongoing Tournaments
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
        <p class="card-title"><i class="las la-sliders-h"></i> Completed Tournaments </p>
        <form id="deleteAllForm" method="DELETE" action="{{ route('delete.all.tournaments') }}" data-parsley-validate autocomplete="off">
          @csrf
          <button class="btn btn-danger" type="submit">Delete All Tournaments</button>
        </form>
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
      <!-- <div class="row"> -->
      <!-- <div class="col-md-3 mb-2 mb-md-0">
          <ul class="nav nav-pills flex-column nav-left">
            <li class="nav-item">
              <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#ongoing-tournaments" aria-expanded="true">
                <i class="las la-globe-europe font-medium-3 mr-1"></i>
                <span class="font-weight-bold">Ongoing Tournaments</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="account-pill-logo" data-toggle="pill" href="#completed-tournaments" aria-expanded="false">
                <i class="lab la-pagelines font-medium-3 mr-1"></i>
                <span class="font-weight-bold">Completed Tournaments</span>
              </a>
            </li>
          </ul>
        </div> -->
      <!--/ left menu section -->
      <!-- <div class="col-md-9"> -->
      <div class="card">
        <div class="card-body">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="ongoing-tournaments" aria-labelledby="account-pill-general" aria-expanded="true">
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
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($completedTournaments as $key =>$result)
                      <tr>
                        <td><span class="font-weight-bold">{{ $completedTournaments->firstItem() + $key }}</span></td>
                        <td>{{ $result->tournament_id }}</td>
                        <td>{{ $result->tournament_name }}</td>
                        <td>{{ $result->prize_pool }} <i class="las la-rupee-sign"></i></td>
                        <td>{{ $result->player_type }}</td>
                        <td>{{ $result->winner }} <i class="las la-users"></i></td>
                        <td>{{ $result->time_start }}</td>
                        <td>{{ $result->game_type }}</td>
                        <td>{{ $result->entry_fee }}</td>
                        <td>
                          <form method="POST" action="{{ route('delete.tournaments', ['tournament_id' => $result->tournament_id]) }}">
                            @csrf <!-- CSRF protection for POST requests -->
                            @method('DELETE') <!-- Method spoofing for DELETE request -->
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="my-1">
                {{ $completedTournaments->onEachSide(3)->links('vendor.pagination.custom') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- END: Content-->
@endsection
@section('js')
<script>
  $(document).ready(function() {
    $('#deleteButton').on('click', function(e) {
      e.preventDefault();

      var tournamentId = $('#tournamentId').val(); // Replace this with how you fetch the tournament ID from your form

      $.ajax({
        url: '/tournament/delete/' + tournamentId,
        type: 'DELETE', // Send a DELETE request
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          // Handle success response
          console.log(response);
          // Check if the deletion was successful
          if (response.success) {
            // Reload the page after successful deletion
            location.reload(true); // Reloads the page from the server
          } else {
            console.log('Deletion unsuccessful.');
          }
        },
        error: function(xhr, status, error) {
          // Handle error response
          console.error(error);
        }
      });

      return false; // Prevent further propagation and default action
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#deleteAllForm').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        url: $(this).attr('action'),
        type: 'DELETE', // Sending a DELETE request
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          // Handle success response
          console.log(response);
          // Reload the page after successful deletion
          location.reload();
        },
        error: function(xhr, status, error) {
          // Handle error response
          console.error(error);
        }
      });
    });
  });
</script>
@endsection