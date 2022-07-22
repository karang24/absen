@extends('layouts.app')
@section('grid')
<style>
* {
  box-sizing: border-box;
}
body {
  min-height: 100vh;
}
.image-container {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  grid-template-rows: repeat(6, 1fr);
  width: 1100px;
  grid-gap: 0.5rem;
}
.image-container .image {
  position: relative;
  padding-bottom: 100%;
}
.image-container .image img {
  height: 100%;
  width: 100%;
  -o-object-fit: cover;
     object-fit: cover;
  left: 0;
  position: absolute;
  top: 0;
}
.image-container .image img:nth-of-type(1) {
  filter: grayscale(1) brightness(30%);
}
.image-container .image img:nth-of-type(2) {
  -webkit-clip-path: var(--clip-start);
          clip-path: var(--clip-start);
  transition: -webkit-clip-path 0.5s;
  transition: clip-path 0.5s;
  transition: clip-path 0.5s, -webkit-clip-path 0.5s;
}
.image-container .image:hover img:nth-of-type(2) {
  -webkit-clip-path: var(--clip-end);
          clip-path: var(--clip-end);
}

</style>

@endsection
@section('content')
 <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
     
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li style="padding: 20px">
                    <span class="m-r-sm text-muted welcome-message">Welcome to GApps</span>
                </li>
               
                <li>
                    <a href="{{url('/logout')}}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <!--li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li-->
            </ul>

        </nav>						

        </div>

 
		<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
					<div class="ibox ">
						<div class="ibox-title">
							<div class="ibox-tools">
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="fa fa-wrench"></i>
								</a>
								<ul class="dropdown-menu dropdown-user">
									<li><a href="#" class="dropdown-item">Config option 1</a>
									</li>
									<li><a href="#" class="dropdown-item">Config option 2</a>
									</li>
								</ul>
								<a class="close-link">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="ibox-content">
							{{-- notifikasi form validasi --}}
								@if ($errors->has('file'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('file') }}</strong>
								</span>
								@endif
						 
								{{-- notifikasi sukses --}}
								@if ($sukses = Session::get('sukses'))
								<div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button> 
									<strong>{{ $sukses }}</strong>
								</div>
								@endif

							<div class="row  justify-content-center align-items-center">

								<div class="image-container" >
								  <div class="image"><a href="{{url('/gms/take5_g')}}"><img src="{{ asset('public/Button_T5_General.jpg') }}"/><img src="{{ asset('public/Button_T5_General.jpg') }}"/></a></div>
								  <div class="image">@if ($data1 >0 )@if ($data1->id == 6 or $data1->id  == 12  or $data1->id  == 13 or $data1->id  == 14 or session('id_role') == 1 )<a href="{{url('/gms/take5_m')}}">@else <a href="#"> @endif @else <a href="{{url('/gms/take5_m')}}"> @endif<img src="{{ asset('public/Button_T5_Mining.jpg') }}"/><img src="{{ asset('public/Button_T5_Mining.jpg') }}"/></a></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/Button_Report_Hazard.jpg') }}"/><img src="{{ asset('public/Button_Report_Hazard.jpg') }}"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								<div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								 <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 0); --clip-end: ellipse(150% 150% at 0 0);"><img src="{{ asset('public/logo.jpg') }}"/><img src="{{ asset('public/logo.jpg') }}"/></div>
								  <!--div class="image" style="--clip-start: inset(100% 0 0 0); --clip-end: inset(0 0 0 0);"><img src="https://i.picsum.photos/id/139/200/200.jpg?hmac=FNSPvHsHcRzKQtNxKKauJgIXpoaAufCwYvr-1w5T3R4"/><img src="https://i.picsum.photos/id/139/200/200.jpg?hmac=FNSPvHsHcRzKQtNxKKauJgIXpoaAufCwYvr-1w5T3R4"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 100% 0); --clip-end: ellipse(150% 150% at 100% 0);"><img src="https://i.picsum.photos/id/642/200/200.jpg?hmac=MJkhEaTWaybCn0y7rKfh_irNHvVuqRHmxcpziWABTKw"/><img src="https://i.picsum.photos/id/642/200/200.jpg?hmac=MJkhEaTWaybCn0y7rKfh_irNHvVuqRHmxcpziWABTKw"/></div>
								  <div class="image" style="--clip-start: polygon(50% 50%,  50% 50%,  50% 50%, 50% 50%); --clip-end: polygon(-50% 50%, 50% -50%, 150% 50%, 50% 150%);"><img src="https://i.picsum.photos/id/253/200/200.jpg?hmac=_dceojr9yz5ZIKoye8I9HOqPCBHfn-jT9aRYdoLx1kQ"/><img src="https://i.picsum.photos/id/253/200/200.jpg?hmac=_dceojr9yz5ZIKoye8I9HOqPCBHfn-jT9aRYdoLx1kQ"/></div>
								  <div class="image" style="--clip-start: circle(0); --clip-end: circle(125%);"><img src="https://i.picsum.photos/id/604/200/200.jpg?hmac=qgFjxODI1hMBMfHo68VvLeji-zvG9y-iPYhyW0EkvOs"/><img src="https://i.picsum.photos/id/604/200/200.jpg?hmac=qgFjxODI1hMBMfHo68VvLeji-zvG9y-iPYhyW0EkvOs"/></div>
								  <div class="image" style="--clip-start: inset(100% 100% 100% 100%); --clip-end: inset(0 0 0 0);"><img src="https://i.picsum.photos/id/119/200/200.jpg?hmac=JGrHG7yCKfebsm5jJSWw7F7x2oxeYnm5YE_74PhnRME"/><img src="https://i.picsum.photos/id/119/200/200.jpg?hmac=JGrHG7yCKfebsm5jJSWw7F7x2oxeYnm5YE_74PhnRME"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 0 100%); --clip-end: ellipse(150% 150% at 0 100%);"><img src="https://i.picsum.photos/id/520/200/200.jpg?hmac=gq6GVKg64GMqsvk_d6gzXZ7L1htska1jEdgBnAwm4xU"/><img src="https://i.picsum.photos/id/520/200/200.jpg?hmac=gq6GVKg64GMqsvk_d6gzXZ7L1htska1jEdgBnAwm4xU"/></div>
								  <div class="image" style="--clip-start: inset(0 0 100% 0); --clip-end: inset(0 0 0 0);"><img src="https://i.picsum.photos/id/553/200/200.jpg?hmac=HSLKzqqoxnajv4KjLxYSjZokWcuCCiZLGdRPUoryhXk"/><img src="https://i.picsum.photos/id/553/200/200.jpg?hmac=HSLKzqqoxnajv4KjLxYSjZokWcuCCiZLGdRPUoryhXk"/></div>
								  <div class="image" style="--clip-start: ellipse(0 0 at 100% 100%); --clip-end: ellipse(150% 150% at 100% 100%);"><img src="https://i.picsum.photos/id/988/200/200.jpg?hmac=-lwK-i6PssD9WlUeVPDIhOxDVxlzJKeM4MgEx_fIqJg"/><img src="https://i.picsum.photos/id/988/200/200.jpg?hmac=-lwK-i6PssD9WlUeVPDIhOxDVxlzJKeM4MgEx_fIqJg"/></div-->
								</div>
															
						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
			

           <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> PT.GMA &copy; 2022-2023
                </div>
            </div>
        </div>
<script type="text/javascript">

  



</script>
@endsection 