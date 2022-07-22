<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>GAPPS</title>
	        @yield('grid')

  <link rel="icon" type="image/x-icon" href="{{ asset('public/logo.jpg') }}">

    <link href="{{ asset('public/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('public/font-awesome/css/font-awesome.css') }} " rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('public/css/plugins/toastr/toastr.min.css') }} " rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('public/js/plugins/gritter/jquery.gritter.css') }} " rel="stylesheet">

    <link href="{{ asset('public/css/animate.css') }} " rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }} " rel="stylesheet">
	
	
    
    <link href="{{ asset('public/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="{{ asset('public/logo.jpg') }}" style="width:70px; border-radius: 50%;"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">Hallo {{session('nama')}}</span>
                                <span class="text-muted text-xs block"> <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              
                                <li><a class="dropdown-item" href="{{url('/logout')}}">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            G-Apps
                        </div>
                    </li>
                    <!--li class="active">
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <!--span class="fa arrow"></span--></a>
                        <!--ul class="nav nav-second-level">
                            <li class="active"><a href="index.html">Dashboard v.1</a></li>
                            <li><a href="dashboard_2.html">Dashboard v.2</a></li>
                            <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                            <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                            <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
                        </ul>
                    </li-->
					<li>
                        <a href="{{url('gms')}}"><i class="fa fa-th-large"></i> <span class="nav-label">GMS </span> <!--span class="fa arrow"></span--></a>
                    </li>
                  @if (session('id_role') == 1 OR session('id_role') ==5)
					
                    <li>
					
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Administrator</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
							
							@if (session('id_role') == 1)
                            <li><a href="{{url('karywan')}}">Employee</a></li>
							@endif
                            
									<li>
										<li><a href="{{url('/roster')}}">Roster</a></li>
									</li>	
									@if (session('id_role') == 1)

									<li>
										<a href="{{url('/shift')}}">Shift</a>
									</li>
									@endif

							
							</li>
                            
                        </ul>
                    </li>  
					@endif
					
					@if (session('id_role') == 3)
					<li>
                        <a href="{{url('jadwal')}}"><i class="fa fa-calendar"></i> <span class="nav-label">Schedule </span> <!--span class="fa arrow"></span--></a>
                    </li>
					@endif
					  <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Report</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
								<a href="">Attendance <span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li>
										<li><a href="{{url('absen_harian')}}">Daily</a></li>
									</li>
									<li>
										<a href="{{url('absen_minggu')}}">Weekly</a>
									</li>
									<li>
										<li><a href="#">Monthly</a></li>
									</li>

								</ul>
							</li>
                            <!--li><a href="graph_rickshaw.html">Report Tahunan</a></li-->
                        </ul>
						
                    </li>  
					
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Helpdesk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{url('/helpdesk')}}">Statement</a></li>
                            <li><a href="{{url('/helpdesk_progres')}}">Status</a></li>
                            <li><a href="form_wizard.html">End</a></li>
                        </ul> 
                    </li>
					 @if (session('id_role') == 1 OR  session('id_role') == 5 )
					<li>
				
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">User Management</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
						<li><a href="{{url('/user')}}">User </a></li>
						 @if (session('id_role') == 1 )
							<li>
								 <li><a href="{{url('/rfid')}}">RFID</a></li>
							</li>
                            <li><a href="{{url('/role')}}">Role </a></li>
                            <li><a href="{{url('/jabatan')}}">Jobs Title</a></li>
                            <li><a href="{{url('/departemen')}}">Departemen</a></li>
                         @endif

                        
                        </ul>
                    </li>
					@endif
                
                </ul>

            </div>
        </nav>
		
		
        @yield('content')
    </div>

    <!-- Mainly scripts -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/js/popper.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('public/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('public/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.tooltip.min.js')}} "></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.pie.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('public/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('public/js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('public/js/inspinia.js')}}"></script>
    <script src="{{asset('public/js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('public/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- GITTER -->
    <script src="{{asset('public/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('public/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('public/js/demo/sparkline-demo.js')}} "></script>

    <!-- ChartJS-->
    <script src="{{asset('public/js/plugins/chartJs/Chart.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{asset('public/js/plugins/toastr/toastr.min.js')}}"></script>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('GMA Presence System', 'Welcome to GApps');

            }, 1300);


            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>
	    @yield('js')

</body>
</html>
</html>
