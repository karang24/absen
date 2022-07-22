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
						   <center><h4>Import Roster</h4></center>
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
						 
								<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
									IMPORT EXCEL
								</button>									
								<a href="{{url('/roster/export_excel')}}" class="btn btn-success my-3" target="_blank">Export Format</a>
		
						 
								<!-- Import Excel -->
								<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<form method="POST" action="{{url('/roster/import_excel')}}" enctype="multipart/form-data">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
												</div>
												<div class="modal-body">
						 
													{{ csrf_field() }}
						 
													<label>Pilih file excel</label>
													<div class="form-group">
														<input type="file" name="file" required="required">
													</div>
						 
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Import</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example" >
						<thead>
						<tr>
							<th>No</th>
							<th>Departemen</th>
							<th>Periode</th>
							<th>Create date</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						
							@php $no=0; @endphp
							@foreach ($roster as $data1)
							@php $no++ @endphp
							<tr>
							<td>{{$no}}</td>
							<td>{{$data1->DEPARTEMEN}}</td>
							<td>{{$data1->BULAN}}</td>
							<td>{{$data1->created_at}}</td>
							<td><a  href="{{url('/detail_roster/'.\Crypt::encrypt($data1->DEPARTEMEN.'|'.$data1->created_at))}}"><button class="btn btn-w-m btn-success">Detail</button></a></td>
							</tr>

							@endforeach
						</tbody>
						<tfoot>
						<tr>
							<th>No</th>
							<th>Departemen</th>
							<th>Periode</th>
							<th>Create date</th>
							<th>Aksi</th>

						</tr>
						</tfoot>
						</table>
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
@stop