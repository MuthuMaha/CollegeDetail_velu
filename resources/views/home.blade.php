@extends('layouts.app1')

@section('content')
 <div class="az-content-header d-block d-md-flex">
        <div>
          <h2 class="az-content-title mg-b-5 mg-b-lg-8">Hi, welcome back!</h2>
          <p class="mg-b-0">Add member with necessary details.</p>
        </div>
      </div><!-- az-content-header -->
      <div class="az-content-body">
        <div class="row row-sm">
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card card-body card-dashboard-fifteen">
              <h1>257</h1>
              <label class="tx-purple">Support Requests</label>
              <span>The total number of support requests that have come in.</span>
              <div class="chart-wrapper">
                <div id="flotChart1" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-sm-6 col-lg-4 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card card-body card-dashboard-fifteen">
              <h1>187</h1>
              <label class="tx-primary">Profiles Received</label>
              <span>The total number of Profiles that have been received.</span>
              <div class="chart-wrapper">
                <div id="flotChart2" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-sm-6 col-lg-4 col-xl-3 mg-t-20 mg-sm-t-20 mg-lg-t-0">
            <div class="card card-body card-dashboard-fifteen">
              <h1>125<span>/187</span></h1>
              <label class="tx-teal">Profiles Resolved</label>
              <span>The total number of Profiles that resolved.</span>
              <div class="chart-wrapper">
                <div id="flotChart3" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-sm-6 col-lg-12 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="d-lg-flex d-xl-block">
              <div class="card wd-lg-50p wd-xl-auto">
                <div class="card-header">
                  <h6 class="card-title tx-14 mg-b-0">Time to Receive Last Profiles</h6>
                </div><!-- card-header -->
                <div class="card-body">
                  <h3 class="tx-bold tx-inverse lh--5 mg-b-15">7m:32s <span class="tx-base tx-normal tx-gray-600">/ Goal: 8m:0s</span></h3>
                  <div class="progress mg-b-0 ht-3">
                    <div class="progress-bar wd-85p bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div><!-- card-body -->
              </div><!-- card -->
              <div class="card mg-t-20 mg-lg-t-0 mg-xl-t-20 mg-lg-l-20 mg-xl-l-0">
                <div class="card-header">
                  <h6 class="card-title tx-14 mg-b-5">Avg. Speed of Uploads</h6>
                  <p class="tx-12 lh-4 tx-gray-500 mg-b-0">Measure how quickly support staff uploads.</p>
                </div><!-- card-header -->
                <div class="card-body">
                  <h2 class="tx-bold tx-inverse lh--5 mg-b-5">0m:20s</h2>
                </div><!-- card-body -->
              </div><!-- card -->
            </div>
          </div><!-- col-3 -->
        </div>
      </div>
         </div>
@endsection
