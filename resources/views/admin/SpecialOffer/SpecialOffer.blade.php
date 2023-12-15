@extends('admin.layout.master')
@section('title')
 Special Offer
@endsection
@section('css')
 <!--  link custom css link here -->
@endsection
@section('content')
 <!-- BEGIN: Content-->
   <div class="row">
   <!-- Bootstrap Validation -->
    <div class="col-md-5 col-12">
      <div class="card">
        <div class="card-header">
          <p class="card-title"><i class="las la-certificate"></i> Add New Special Offer</p>
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
          <form class="create_brand" method="post" action="{{route('create.product.brand')}}" enctype="multipart/form-data" data-parsley-validate autocomplete="off">
            @csrf
            <div class="form-group">
              <label>Offer Title <span class="text-danger required-sign">*</span></label>
              <input type="text" class="form-control offer_title" name="offer_title" required />
            </div>
            <div class="form-group">
              <label>Add Offer Coin <span class="text-danger required-sign">*</span></label>
              <input type="text" class="form-control add_offer_coin" required name="add_offer_coin"/>
            </div>
            <div class="form-group">
              <label >User Received Coin <span class="text-danger required-sign">*</span></label>
              <input type="text" class="form-control user_received_coin" required name="user_received_coin"/>
            </div>
            <div class="form-group image_button d-none">
              <button type="button" class="btn btn-outline-success round" data-toggle="modal" data-target="#success"><i class="las la-eye"></i> View Your Previous Image</button>
            </div>
            <div class="form-group">
            <label class="form-label">Offer Image <span class="text-danger">*</span></label>
              	<input type="file" accept="image/*" class="dropify offerimage" name="offerimage" required data-height="176" />
            </div>
            <div class="row my-3">
              <div class="col-12">
              <button type="submit" class="btn btn-orange float-right border-0 submit_btn">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Bootstrap Validation -->
    <!-- Merged -->
    <div class="col-md-7 col-12">
          <div class="card">
      <div class="card-header">
        <p class="card-title"><i class="las la-certificate"></i> All Special Offer</p>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Offer Title</th>
              <th>Add Coin</th>
              <th>Received Coin</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($brands as $key =>$result)
            <tr>
              <td><span class="font-weight-bold">{{ $brands->firstItem() + $key }}</span></td>
              <td><span class="font-weight-bold">{{$result->offer_title}}</span></td>
              <td>{{$result->add_offer_coin}}</td>
              <td>{{$result->user_received_coin}}</td>
              <td><img src="{{url('/')}}/storage/OfferImg/{{$result->offerimage}}" width="50"></td>
              <td>
              <button type="button" data-id="{{$result->id}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-icon btn-icon rounded-circle btn-primary bg-darken-4 border-0 edit_buuton">
               <i class="las la-highlighter"></i>
              </button>
              <button type="button" delete-id="{{$result->id}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-icon btn-icon rounded-circle btn-danger bg-darken-4 border-0 delete_buuton">
               <i class="las la-trash"></i>
              </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="my-1">
        {{ $brands->onEachSide(3)->links('vendor.pagination.custom') }}
      </div>
    </div>
    </div>
  </div>
  <div class="d-inline-block">
              <!-- Button trigger modal -->
              <!-- Modal -->
              <div class="modal fade text-left modal-success" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel110">Your Previous Image</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <center>
                        <div class="image_field"></div>
                      </center>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    <!-- END: Content-->
@endsection
@section('js')
<!-- link custom js link here -->
<script src="{{URL::asset('admin-assets/css/custom/js/brand/brand.js')}}"></script>
@endsection
