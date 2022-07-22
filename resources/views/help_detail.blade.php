@extends('layouts.app')

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
						   <center><h4>Detail Request</h4></center>
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
								<div class="col-lg-12">
									<div class="ibox ">
										<div class="ibox-title">
											
										</div>
										<div class="ibox-content">
											<div class="row">
												<div class="col-sm-12 b-r">
												
													<form role="form" method="POST" action="{{url('/proses/helpdesk/edit')}}" >
													@foreach ($data1 as $datas)
														<div class="form-group">
															<label>From</label> 
															<input class="form-control" value="{{$datas->nama}}" name="" readonly>
														</div>
														<div class="form-group">
															<label>To</label> 
															<input class="form-control" value="{{$datas->departemen}}" readonly>
														</div>
														
														<div class="form-group">
															<label>Description</label> 
															<textarea class="form-control" readonly>{{$datas->deskripsi}}</textarea>
														</div>
														<div class="form-group">
															@if ($datas->photo != '')
															<img src ="{{ asset('public/file/') }}/{{$datas->photo}}"  width="40%" height="20%">
															@endif
														</div>
														<div class="form-group">
															<label>Status</label>
															<select  class="form-control" name="status" > 
																<option value="Proses">Proses</option>
																<option value="Hold">Hold</option>
															</select>
															<input type="hidden" name="id_penindak" class="form-control" value="{{session('id_user')}}" readonly>
															<input type="hidden" name="id_help" class="form-control" value="{{$id_help}}" readonly>
															
														</div>
													@endforeach
														<div>
															<button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Simpan</strong></button>
															<label> 
														</div>
													</form>
												</div>
												
											</div>
										</div>
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



@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$.ajaxSetup({

				  headers : {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				  }

			  });
 $(function () {
    

    
  });

</script>
@stop				
		