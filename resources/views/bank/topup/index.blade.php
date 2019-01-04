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
            </div>
            <button class="btn bg-primary">
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
                              <th>Recive Email</th>
                              <th>TopUp Date</th>
                              <th>Ammount</th>
                              <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($topup as $key)
                          <tr>
                              <td>{{$key->topup_code}}</td>
                              <td>{{ $key->recive_email }}</td>
                              <td>{{ $key->created_at}}</td>
                              <td>IDR Rp. {{$key->ammount}},00</td>
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
