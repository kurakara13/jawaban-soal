@extends('bank.layouts.app')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/DataTables/dataTables.min.css')}}">

@endsection

@section('content')
 <!-- Container-fluid starts -->
 <!-- Main content starts -->
 <div class="container-fluid">
  <div class="row">
      <div class="main-header">
          <h4>TopUp</h4>
      </div>
  </div>
  <!-- 4-blocks row start -->
  <div class="row m-b-30 dashboard-header">
    <div class="col-lg-12 col-sm-6">
        <div class="col-sm-12 card dashboard-product">
            <span>Your Balance</span>
            <h2 class="dashboard-total-products">IDR {{$bank_ammount->ammount}},00</h2>
            <div class="form-group">
              <form method="post" action="{{url('bank/bank-account/account-change')}}" id="bank-change">
                @csrf
                <span>Bank Account : </span>
                <?php
                  $selected = '';
                  $account_id = null;

                  if(session()->has('account_id')){
                    $selected = 'selected';
                    $account_id = session()->get('account_id');
                  }
                 ?>
                <select name="id" onchange="bankChange()">
                  @foreach($bank_account as $key)
                  <option value="{{$key->id}}" @if($key->id ==  $account_id) {{'Selected'}} @endif>{{$key->account_number}}</option>
                  @endforeach
                </select>
              </form>
              @if(Session::has('message-account'))
                <br>
                <p class="alert alert-success">{{ Session::get('message-account') }}</p>
              @endif
              <button type="button" class="btn btn-info"  style="float:right;" data-toggle="modal" data-target="#createModal">New Account</button>
            </div>
        </div>
    </div>
  </div>
  <!-- 4-blocks row end -->
  <!-- 1-3-block row start -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
          <div class="card-header">
              <h5 class="card-header-text">Bank List</h5>
          </div>
          <div class="card-block">
              <div class="row">
                  <div class="col-sm-12 table-responsive">
                      <table id="example" class="display" style="width:100%">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Account Number</th>
                              <th>Name</th>
                              <th>Bank</th>
                              <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($bank_account as $key)
                          <tr>
                              <td>{{$loop->index+1}}</td>
                              <td>{{$key->account_number}}</td>
                              <td>{{$key->account_name}}</td>
                              <td>{{$key->bank_name}}</td>
                              <td><button class="btn btn-primary">Detail</button></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      </div>
    </div>
 </div>
<!-- Main content ends -->
<!-- Container-fluid ends -->

<!-- Modal -->
<div id="createModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="{{url('bank/bank-account')}}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Bank Account</h4>
        </div>
        <div class="modal-body">
          @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
          @endif
  		    <div class="form-group has-error">
  		        <label for="slug">Account Number <span class="require">*</span></label>
  		        <input type="number" class="form-control" name="account_number" />
  		    </div>

  		    <div class="form-group">
  		        <label for="title">Name <span class="require">*</span></label>
  		        <input type="text" class="form-control" name="account_name" />
  		    </div>

          <div class="form-group">
              <label for="title">Transaction Code <span class="require">*</span></label>
              <input type="password" class="form-control" name="transaction_code" />
          </div>

  		    <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
    		        <label for="description">Bank</label>
    		        <input type="text" class="form-control" name="bank_name" ></input>
              </div>
              <div class="col-sm-6">
    		        <label for="description">Status</label>
                <select name="status" class="form-control">
                  <option value="">Choose Status</option>
                  <option value="1">Active</option>
                  <option value="0">Non Active</option>
                </select>
              </div>
            </div>
          </div>

  		    <div class="form-group">
  		        <p><span class="require">*</span> - required fields</p>
  		    </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('extraScript')
<script src="{{asset('vendor/DataTables/dataTables.min.js')}}"></script>
<script>
$(document).ready(function() {
  $('#example').DataTable({
    responsive: true
  });
});


function bankChange(){
  $( "#bank-change" ).submit();
}
</script>

@endsection
