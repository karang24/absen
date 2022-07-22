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
						   <center><h4>Daftar Permintaan</h4></center>
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
						 		@if (session('id_role') != 1)
								<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
									Request Bantuan
								</button>
								@endif
								<!-- Import Excel -->
									<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
										</div>
										@if (session('id_role') != 1)
										<form method="POST" action="{{url('/helpdesk/add')}}" enctype="multipart/form-data">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Request Bantuan</h5>
												</div>
												<div class="modal-body">
						 
													{{ csrf_field() }}
						 
													<div class="form-group">
															<label>Nama</label> 
															<input type="text" name="nama"  placeholder="Nama Lengkap" value="{{$karyawan[0]->nama}}" readonly class="form-control">
															<input type="hidden" name="id_pemohon"  placeholder="Nama Lengkap" value="{{$karyawan[0]->id}}"  class="form-control">
													</div>
													<div class="form-group">
															<label>NIK SAP</label> 
															<input type="number" name="nik_sap"  placeholder="Nik SAP" value="{{$karyawan[0]->nik_sap}}" readonly class="form-control" >
													</div>
													<div class="form-group">
															<label>NO ID</label>
															<input type="text" name="no_id" placeholder="No ID" value="{{$karyawan[0]->no_id}}"  readonly class="form-control">
													</div>
													<div class="form-group">
														<label>Jabatan</label> 
														<select class="form-control" name="jabatan" readonly>
																@foreach ($jabatan as $jab) 
																	<option value="{{$jab->id}}" >{{$jab->jabatan}}</option> 
																@endforeach
														</select>
													</div>
													<div class="form-group">
															<label>Departemen</label> 
															<select class="form-control" name="departemen" readonly  >
																
																@foreach ($departemen as $dep) 
																	<option value="{{$dep->id}}" >{{$dep->departemen}}</option> 
																@endforeach
															</select>
													</div>
													<div class="form-group">
															<label>Deskripsi Masalah</label> 
															<textarea id="konten" class="form-control" name="konten" rows="10" cols="50" data-sample-short ></textarea>															
													</div>
													<div class="form-group">
															<label>foto</label> 
															<input type="file" name="file" placeholder="No ID" value=""  class="form-control">

													</div>
													<div class="form-group">
															<label>To </label> 
														<select class="form-control" name="id_departemen_pen">

																@foreach ($departemen1 as $dep1) 
																	<option value="{{$dep1->id}}" >{{$dep1->departemen}}</option> 
																@endforeach
														</select>
													</div>
						 
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">save</button>
												</div>
											</div>
										</form>
										@endif
									</div>  
								</div>
							<div class="col-lg-12 animated fadeInRight">
									<div class="mail-box-header">					  
										<h2>
											Request ({{$data->where('status','New')->count()}})
										</h2>
										<div class="mail-tools tooltip-demo m-t-md">
											<button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
										</div>
									</div>
									<div class="mail-box">
										<table class="table table-hover table-mail">
										<tbody>
										@foreach ($data->wherein('status',['New']) as $data1)
										@if ($data1->status =="New")
										<tr class=  "unread">
										@else 
											<tr class=  "read">
										@endif
											<td class="check-mail">
												<div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
											</td>
											<td class="mail-ontact"> 
												@if (session('id_role') != 1)
													@if ($departemen[0]->departemen == $data1->departemen)
														<a href="{{url('helpdesk/detail/')}}/{{$data1->id}}">{{$data1->nama}}</a> 
													@else
														{{$data1->nama}}

													@endif
													@else
													{{$data1->nama}}
												@endif
											@if ($data1->status == "New") <span class="label label-info float-right">{{$data1->status}}</span>@endif 
											@if ($data1->status == "Hold") <span class="label label-danger float-right">{{$data1->status}}</span>@endif </td>
											<td class="mail-subject">{{$data1->deskripsi}}</td>
											<td class="">to {{$data1->departemen}}</td>
											<td class="text-right mail-date">{{$data1->date}}</td>
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
					
					