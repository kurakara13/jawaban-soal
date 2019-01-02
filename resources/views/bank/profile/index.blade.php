@extends('bank.layouts.app')

@section('extraCss')

@endsection

@section('content')
 <!-- Container-fluid starts -->
 <!-- Main content starts -->
 <div class="container-fluid">
  <div class="row">
      <div class="main-header">
          <h4>Profile</h4>
      </div>
  </div>
  <!-- 4-blocks row end -->
  <!-- 1-3-block row start -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-block">
            <div class="row">
              <div class="col-sm-4">
                <div class="user-block-2">
                    <img class="img-fluid" src="{{asset('vendor/ablepro-lite/assets/images/widget/user-1.png')}}" alt="user-header">
                    <h5>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h5>
                    <h6>Member</h6>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-clock-time"></i> First Name
                        <label class="">{{Auth::user()->firstname}}</label>
                    </div>
                </div>
                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-users"></i> Last Name
                        <label class="">{{Auth::user()->lastname}}</label>
                    </div>
                </div>

                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-ui-user"></i> Email
                        <label class="">{{Auth::user()->email}}</label>
                    </div>

                </div>
                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-picture"></i> Your Ballance
                        <label class="">IDR {{Auth::user()->ammount}},00</label>
                    </div>

                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary waves-effect waves-light text-uppercase">
                        Edit
                    </button>
                </div>
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

@endsection
