<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/azia/img/azia-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <title>CollegeLogin</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/morris.js/morris.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

  </head>
  <body class="az-body az-body-sidebar az-light">

    <div class="az-sidebar">
      <div class="az-sidebar-header">
        <a href="index.html" class="az-logo">College<span>Lo</span>gin</a>
      </div><!-- az-sidebar-header -->
      <div class="az-sidebar-loggedin">
        <div class="az-img-user online"><img src="https://via.placeholder.com/500x500" alt=""></div>
        <div class="media-body">
          <h6>CollegeAdmin</h6>
          <span>Designation</span>
        </div><!-- media-body -->
      </div><!-- az-sidebar-loggedin -->
      <div class="az-sidebar-body">
        <ul class="nav">
          <li class="nav-label">Main Menu</li>
          <li class="nav-item active show">
            <a href="/" class="nav-link ">Dashboard</a>
           
          </li><!-- nav-item -->         
          <li class="nav-item">
            <a href="/table" class="nav-link ">Add</a>
           
          </li><!-- nav-item -->
        </ul><!-- nav -->
      </div><!-- az-sidebar-body -->
    </div><!-- az-sidebar -->
    <div class="az-content az-content-dashboard-five">
      <div class="az-header">
        <div class="container-fluid">
          <div class="az-header-left">
            <a href="" id="azSidebarToggle" class="az-header-menu-icon"><span></span></a>
          </div><!-- az-header-left -->
         
                <div class="az-header-right" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('CollegeLogin') }}</a>
                            </li>
                           <!--  @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->Staff_Name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
      </div><!-- az-header -->
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
      <div class="az-footer">
        <div class="container-fluid">
          <span>&copy; 2019 CollegeAdmin</span>
          <span>CollegeAdmin</span>
        </div><!-- container -->
      </div><!-- az-footer -->
    </div><!-- az-content -->


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.pie.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/chart.flot.sampledata.js"></script>
    <script>
      $(function(){
        'use strict'

        $('.az-sidebar .with-sub').on('click', function(e){
          e.preventDefault();
          $(this).parent().toggleClass('show');
          $(this).parent().siblings().removeClass('show');
        })

        $(document).on('click touchstart', function(e){
          e.stopPropagation();

          // closing of sidebar menu when clicking outside of it
          if(!$(e.target).closest('.az-header-menu-icon').length) {
            var sidebarTarg = $(e.target).closest('.az-sidebar').length;
            if(!sidebarTarg) {
              $('body').removeClass('az-sidebar-show');
            }
          }
        });


        $('#azSidebarToggle').on('click', function(e){
          e.preventDefault();

          if(window.matchMedia('(min-width: 992px)').matches) {
            $('.az-sidebar').toggle();
          } else {
            $('body').toggleClass('az-sidebar-show');
          }
        })

        /* ----------------------------------- */
        /* Dashboard content */

        $.plot('#flotChart1', [{
            data: flotSampleData5,
            color: '#8039f4'
          }], {
                series: {
                    shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0 }, { opacity: 0.12 } ] }
            }
                },
          grid: {
            borderWidth: 0,
            labelMargin: 10,
            markings: [{ color: '#70737c', lineWidth: 1, font: {color: '#000'}, xaxis: { from: 75, to: 75} }]
          },
                yaxis: { show: false },
                xaxis: {
            show: true,
            position: 'top',
            color: 'rgba(102,16,242,.1)',
            reserveSpace: false,
            ticks: [[15,'1h'],[35,'1d'],[55,'1w'],[75,'1m'],[95,'3m'], [115,'1y']],
            font: {
              size: 10,
              weight: '500',
              family: 'Roboto, sans-serif',
              color: '#999'
            }
          }
            });

        $.plot('#flotChart2', [{
            data: flotSampleData2,
            color: '#007bff'
          }], {
                series: {
                    shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0 }, { opacity: 0.5 } ] }
            }
                },
          grid: {
            borderWidth: 0,
            labelMargin: 10,
            markings: [{ color: '#70737c', lineWidth: 1, font: {color: '#000'}, xaxis: { from: 75, to: 75} }]
          },
                yaxis: { show: false },
                xaxis: {
            show: true,
            position: 'top',
            color: 'rgba(102,16,242,.1)',
            reserveSpace: false,
            ticks: [[15,'1h'],[35,'1d'],[55,'1w'],[75,'1m'],[95,'3m'], [115,'1y']],
            font: {
              size: 10,
              weight: '500',
              family: 'Roboto, sans-serif',
              color: '#999'
            }
          }
            });

        $.plot('#flotChart3', [{
            data: flotSampleData5,
            color: '#00cccc'
          }], {
                series: {
                    shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.5 } ] }
            }
                },
          grid: {
            borderWidth: 0,
            labelMargin: 10,
            markings: [{ color: '#70737c', lineWidth: 1, font: {color: '#000'}, xaxis: { from: 75, to: 75} }]
          },
                yaxis: { show: false },
                xaxis: {
            show: true,
            position: 'top',
            color: 'rgba(102,16,242,.1)',
            reserveSpace: false,
            ticks: [[15,'1h'],[35,'1d'],[55,'1w'],[75,'1m'],[95,'3m'], [115,'1y']],
            font: {
              size: 10,
              weight: '500',
              family: 'Roboto, sans-serif',
              color: '#999'
            }
          }
            });

        $.plot('#flotPie', [
          { label: 'Very Satisfied', data: [[1,25]], color: '#6f42c1'},
          { label: 'Satisfied', data: [[1,38]], color: '#007bff'},
          { label: 'Not Satisfied', data: [[1,20]], color: '#00cccc'},
          { label: 'Very Unsatisfied', data: [[1,15]], color: '#969dab'}
        ], {
          series: {
            pie: {
              show: true,
              radius: 1,
              innerRadius: 0.5,
              label: {
                show: true,
                radius: 3/4,
                formatter: labelFormatter
              }
            }
          },
          legend: { show: false }
        });

        function labelFormatter(label, series) {
          return '<div style="font-size:11px; font-weight:500; text-align:center; padding:2px; color:white;">' + Math.round(series.percent) + '%</div>';
        }

        var ctx6 = document.getElementById('chartStacked1');
        new Chart(ctx6, {
          type: 'bar',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
              data: [10, 24, 20, 25, 35, 50, 20, 30, 28, 33, 45, 65],
              backgroundColor: '#6610f2',
              borderWidth: 1,
              fill: true
            },{
              data: [20, 30, 28, 33, 45, 65, 25, 35, 50, 20, 30, 28],
              backgroundColor: '#00cccc',
              borderWidth: 1,
              fill: true
            }]
          },
          options: {
            maintainAspectRatio: false,
            legend: {
              display: false,
                labels: {
                  display: false
                }
            },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true,
                  fontSize: 11
                }
              }],
              xAxes: [{
                barPercentage: 0.4,
                ticks: {
                  fontSize: 11
                }
              }]
            }
          }
        });
      });
    </script>
  </body>
</html>
