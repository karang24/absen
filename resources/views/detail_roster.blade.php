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
						   <center><h4>Roster Departemen {{$data['departemen']}} Periode {{$roster[0]->BULAN}} </h4></center>
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
								<a href="{{ URL('/roster') }}"><button type="button" class="btn btn-info mr-5">
									<span class="fa fa-backward"></span> Back
								</button></a>
						 
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
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Departemen</th>
							<th>Periode</th>
							<th>21</th>
							<th>22</th>
							<th>23</th>
							<th>24</th>
							<th>25</th>
							<th>26</th>
							<th>27</th>
							<th>28</th>
							<th>29</th>
							<th>30</th>
							<th>31</th>
							<th>01</th>
							<th>02</th>
							<th>03</th>
							<th>04</th>
							<th>05</th>
							<th>06</th>
							<th>07</th>
							<th>08</th>
							<th>09</th>
							<th>10</th>
							<th>11</th>
							<th>12</th>
							<th>13</th>
							<th>14</th>
							<th>15</th>
							<th>16</th>
							<th>17</th>
							<th>18</th>
							<th>19</th>
							<th>20</th>
							<th>Create Date</th>
							<th>Note</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						
							@php $no=0; @endphp
							@foreach ($roster as $data1)
							@php $no++ @endphp
							<tr>
							<td>{{$no}}</td>
							<td>{{$data1->NAMA}}</td>
							<td>{{$data1->JABATAN}}</td>
							<td>{{$data1->DEPARTEMEN}}</td>
							<td>{{$data1->BULAN}}</td>
							<td>{{$data1->duasatu}}</td>
							<td>{{$data1->duadua}}</td>
							<td>{{$data1->duatiga}}</td>
							<td>{{$data1->duaempat}}</td>
							<td>{{$data1->dualima}}</td>
							<td>{{$data1->duaenam}}</td>
							<td>{{$data1->duatujuh}}</td>
							<td>{{$data1->dualapan}}</td>
							<td>{{$data1->duasembilan}}</td>
							<td>{{$data1->tigapuluh}}</td>
							<td>{{$data1->tigasatu}}</td>
							<td>{{$data1->satu}}</td>
							<td>{{$data1->dua}}</td>
							<td>{{$data1->tiga}}</td>
							<td>{{$data1->empat}}</td>
							<td>{{$data1->lima}}</td>
							<td>{{$data1->enam}}</td>
							<td>{{$data1->tujuh}}</td>
							<td>{{$data1->lapan}}</td>
							<td>{{$data1->sembilan}}</td>
							<td>{{$data1->sepuluh}}</td>
							<td>{{$data1->sebelas}}</td>
							<td>{{$data1->duabelas}}</td>
							<td>{{$data1->tigabelas}}</td>
							<td>{{$data1->empatbelas}}</td>
							<td>{{$data1->limabelas}}</td>
							<td>{{$data1->enambelas}}</td>
							<td>{{$data1->tujuhbelas}}</td>
							<td>{{$data1->lapanbelas}}</td>
							<td>{{$data1->sembilanbelas}}</td>
							<td>{{$data1->duapuluh}}</td>							
							<td>{{$data1->created_at}}</td>
							<td>{{$data1->created_at}}</td>
							<td><a  href="{{url('/edit_roster/'.\Crypt::encrypt($data1->DEPARTEMEN.'|'.$data1->BULAN.'|'.$data1->NAMA.'|'.$data1->JABATAN))}}"><button class="btn btn-success">Edit</button></a></td>
							</tr>

							@endforeach
						</tbody>
						<tfoot>
						<th>No</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Departemen</th>
							<th>Periode</th>
							<th>20</th>
							<th>21</th>
							<th>22</th>
							<th>23</th>
							<th>24</th>
							<th>25</th>
							<th>26</th>
							<th>27</th>
							<th>28</th>
							<th>29</th>
							<th>30</th>
							<th>31</th>
							<th>01</th>
							<th>02</th>
							<th>03</th>
							<th>04</th>
							<th>05</th>
							<th>06</th>
							<th>07</th>
							<th>08</th>
							<th>09</th>
							<th>10</th>
							<th>11</th>
							<th>12</th>
							<th>13</th>
							<th>14</th>
							<th>15</th>
							<th>16</th>
							<th>17</th>
							<th>18</th>
							<th>19</th>
							<th>Create Date</th>
							<th>Note</th>
							<th>Aksi</th>
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