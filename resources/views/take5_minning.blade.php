@extends('layouts.app')
@section('grid')

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
								<form role="form" method="POST" action="{{url('/gms/take5_g_insert')}}" >

								<table class="table table-striped table-bordered table-hover dataTables-example">
									<tr>
										<td>Nama</td>
										<td><input class="form-control" name="nama" value="{{$karyawan[0]->username}}" readonly></td>
										<td>Tanggal</td>
										<td><input type="date" name="tgl"class="form-control" required> </td>
									</tr>
									<tr>
										<td>Tugas</td>
										<td colspan="3"> <input class="form-control" required name="tugas" placeholder="Isi dengan tugas yang dikerjakan sekarang"></td>
										
									</tr>
								</table>
									<table class="table table-striped table-bordered table-hover dataTables-example" >
										@php $noo=1 ; @endphp
										@foreach ($data1 as $datas1) 
										<thead>
											<tr>
												<th> {{$noo++}}</th>
												<th> <h3><b>{{$datas1->kategori}}</b></h3></th>
												<th> <h3><b>YA</b></h3></th>
												<th> <h3><b>NA</b></h3></th>
												<th> <h3><b>TIDAK</b></h3></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($data2 as $key =>$datas2)
												@php $nos=1+$key ; @endphp

												@if($datas2->kategori == $datas1->kategori)
											<tr>
												<td></td>
												<td>
														<input name="id_item[]" type="hidden" value="{{$datas2->id}}"> {{$datas2->item}}
												</td>
												@if ($datas1->kategori == 'Buat Perubahan' )
												<td colspan='3'></td>
										</tbody>
										</table>
										<table class="table table-bordered table-hover" >
												
										<tbody>
													<tr bgcolor="red" style="color: white;" >
														<td ><b>Jenis Atau Nomor Bahaya</b></td>
														<td colspan='4'><b>Pengendalian</b></td>
													</tr>
													<tr>
														<td><input class='form-control'></td>
														<td  colspan='4'><input class='form-control'></td>
														
													</tr>
													<tr>
														<td><input class='form-control'></td>
														<td  colspan='4'><input class='form-control'></td>
														
													</tr>
													<tr>
														<td><input class='form-control'></td>
														<td  colspan='4'><input class='form-control'></td>
														
													</tr>
													<tr>
														<td><input class='form-control'></td>
														<td  colspan='4'><input class='form-control'></td>
														
													</tr>
													<tr>
														<td><input class='form-control'></td>
														<td  colspan='4'><input class='form-control'></td>
														
													</tr>
													<tr>
														<td><input class='form-control'></td>
														<td  colspan='4'><input class='form-control'></td>
														
													</tr>
										</tbody>
										</table>
										<table class="table table-striped table-bordered table-hover dataTables-example" >
												@elseif ($datas2->item == 'Jam Berapa')
												<td  colspan='3'><input type="time" class="form-control" ></td>
												@elseif ($datas2->item == '-')
												<td  colspan='3'></td>

												@else
												
												<td><input type="radio" class="form-control" required name="value[]{{$nos}}" value="YA"></td>
												<td><input type="radio" class="form-control" required name="value[]{{$nos}}" value="NA"></td>
												<td><input type="radio" class="form-control" required name="value[]{{$nos}}" value="TIDAK"></td>
												@endif
												
											</tr>
												@endif

											@endforeach
										@endforeach
									</table>
									<button type="submit" class="btn btn-success" > Save
								</form>
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