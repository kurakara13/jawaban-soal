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
            <h2 class="dashboard-total-products">IDR {{Auth::user()->ammount}},00</h2>
            <button class="btn bg-primary">
                New Account
            </button>
            <span>Choose Account</span>
            <select class="btn bg-warning">
              <option>121341</option>
            </select>
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
                              <th>TopUp Code</th>
                              <th>Email</th>
                              <th>TopUp Date</th>
                              <th>Ammount</th>
                              <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>AS124AS</td>
                              <td>{{ Auth::user()->email }}</td>
                              <td>{{ date('Y-m-d H:m:s')}}</td>
                              <td>IDR Rp. 100,000,00</td>
                              <td><button class="btn btn-primary">Detail</button></td>
                          </tr>
                          <tr>
                              <td>DA162SA</td>
                              <td>{{ Auth::user()->email }}</td>
                              <td>{{ date('Y-m-d H:m:s')}}</td>
                              <td>IDR Rp. 5,000,000,00</td>
                              <td><button class="btn btn-primary">Detail</button></td>
                          </tr>
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
</script>

@endsection
