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
            <h2 class="dashboard-total-products">IDR {{$ammount}},00</h2>
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

              @if(Session::has('message-transaction-code'))
                <p class="alert alert-danger">{{ Session::get('message-transaction-code') }}</p>
              @endif
            </div>
            <button class="btn bg-primary" data-toggle="modal" data-target="#createModal">
                New TopUp
            </button>
        </div>
    </div>
  </div>
  <!-- 4-blocks row end -->
  <!-- 1-3-block row start -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
          <div class="card-header">
              <h5 class="card-header-text">TopUp Activity</h5>
          </div>
          <div class="card-block">
              <div class="row">
                  <div class="col-sm-12 table-responsive">
                      <table id="example" class="display" style="width:100%">
                        <thead>
                          <tr>
                              <th>TopUp Code</th>
                              <th>Bank Account</th>
                              <th>TopUp Date</th>
                              <th>Ammount</th>
                              <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($topup as $key)
                          <tr>
                              <td>{{$key->topup_code}}</td>
                              <td>{{ $key->bank_account_id }}</td>
                              <td>{{ $key->created_at}}</td>
                              <td>IDR Rp. {{$key->ammount}},00</td>
                              <td><button class="btn btn-primary" data-toggle="modal" data-target="#detailModal{{$key->id}}">Detail</button></td>
                          </tr>
                          <div id="detailModal{{$key->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                              <!-- Modal content-->
                              <form action="{{url('bank/topup')}}" method="POST">
                                @csrf
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Detail TopUp</h4>
                                  </div>
                                  <div class="modal-body">

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label for="description">Account Number</label>
                                        </div>
                                        <div class="col-sm-8">
                                          : {{$key->getBankAccount->account_number}}
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label for="description">TopUp Code</label>
                                        </div>
                                        <div class="col-sm-8">
                                          : {{$key->topup_code}}
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label for="description">Account Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                          : {{$key->getBankAccount->account_name}}
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label for="description">TopUp Date</label>
                                        </div>
                                        <div class="col-sm-8">
                                          : {{$key->created_at}}
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label for="description">Ammount</label>
                                        </div>
                                        <div class="col-sm-8">
                                          : IDR {{$key->ammount}},00
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label for="description">Previous Ammount</label>
                                        </div>
                                        <div class="col-sm-8">
                                          : IDR {{$key->previous_ammount}},00
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label for="description">Current Ammount</label>
                                        </div>
                                        <div class="col-sm-8">
                                          : IDR {{$key->current_ammount}},00
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label for="description">Information</label>
                                        </div>
                                        <div class="col-sm-8">
                                          : {{$key->information}}
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
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
    <form action="{{url('bank/topup')}}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New TopUp</h4>
        </div>
        <div class="modal-body">
  		    <div class="form-group">
		        <label for="description">Your Account Number</label>
            <select name="bank_account" class="form-control" required>
              <option value="">Choose Account</option>
              @foreach($bank_account as $key)
              <option value="{{$key->id}}">{{$key->account_number}}</option>
              @endforeach
            </select>
	        </div>

          <div class="form-group">
		        <label for="description">Ammount</label>
            <input type="number" class="form-control" name="ammount" required></input>
          </div>

          <div class="form-group">
              <label for="title">Note <span class="require">*</span></label>
              <textarea class="form-control" name="note"></textarea>
          </div>

          <div class="form-group">
              <label for="title">Transaction Code <span class="require">*</span></label>
              <input type="password" class="form-control" name="transaction_code" required/>
          </div>

  		    <div class="form-group">
  		        <p><span class="require">*</span> - required fields</p>
  		    </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Top Up</button>
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
