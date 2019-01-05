@extends('bank.layouts.app')

@section('content')
 <!-- Container-fluid starts -->
 <!-- Main content starts -->
 <div class="container-fluid">
  <div class="row">
      <div class="main-header">
          <h4>Dashboard</h4>
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
            </div>
            <div class="side-box bg-primary">
                <i class="feather icon-credit-card"></i>
            </div>
        </div>
    </div>
  </div>
  <!-- 4-blocks row end -->
  <!-- 1-3-block row start -->
  <div class="row">
    <!-- Line Chart start -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">Activity Chart</h5>
            </div>
            <div class="card-block">
                <div id="line-example"></div>
            </div>
        </div>
    </div>
    <!-- Line Chart end -->
  </div>
 </div>
<!-- Main content ends -->
<!-- Container-fluid ends -->
@endsection

@section('extraScript')

<!-- Morris Chart js -->
<script src="{{asset('vendor/ablepro-lite/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('vendor/ablepro-lite/assets/plugins/morris.js/morris.js')}}"></script>
<script>
$(document).ready(function() {

  lineChart();

  $(window).resize(function() {
    window.lineChart.redraw();
  });
});

   /*Line chart*/
function lineChart() {
  window.lineChart = Morris.Line({
        element: 'line-example',
        data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        redraw: true,
        ykeys: ['a', 'b'],
        labels: ['TopUp', 'WithDraw'],
        lineColors :['#2196F3','#ff5252']
    });
}

function bankChange(){
  $( "#bank-change" ).submit();
}
</script>

@endsection
