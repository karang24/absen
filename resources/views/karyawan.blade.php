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
						   <center><h4>Employee</h4></center>
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
									Add Employee
								</button>
						 
								<!-- Import Excel -->
									<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<form method="POST" action="{{url('/karyawan/add')}}" enctype="multipart/form-data">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
												</div>
												<div class="modal-body">
						 
													{{ csrf_field() }}
						 
													<div class="form-group">
															<label>Nama</label> 
															<input type="test" name="nama"  placeholder="Nama Lengkap" value="" class="form-control">
													</div>
													<div class="form-group">
															<label>NIK SAP</label> 
															<input type="number" name="nik_sap"  placeholder="Nik SAP" value="" class="form-control" >
													</div>
													<div class="form-group">
															<label>NO ID</label>
															<input type="text" name="no_id" placeholder="No ID" value=""  class="form-control">
													</div>
													<div class="form-group">
														<label>Jabatan</label> 
														<select class="form-control" name="jabatan">

															@foreach ($jabatan as $job) 
																<option value="{{$job->id}}" >{{$job->jabatan}}</option> 
															@endforeach
														</select>
													</div>
													<div class="form-group">
															<label>Departemen</label> 
															<select class="form-control" name="departemen"  >
																

																@foreach ($departemen as $dep) 
																	<option value="{{$dep->id}}" >{{$dep->departemen}}</option> 
																@endforeach
															</select>
															
													</div>
													<div class="form-group">
															<label>Golongan</label> 
															<select class="form-control" name="golongan"  >
																

																@foreach ($golongan as $gol) 
																	<option value="{{$gol->id}}" >{{$gol->golongan}}</option> 
																@endforeach
															</select>
															
													</div>
													<!--div class="form-group">
															<label>Detail</label> 
															<select class="form-control" name="detail"  >
																

																@foreach ($detail as $del) 
																	<option value="{{$del->id}}" >{{$del->detail}}</option> 
																@endforeach
															</select>
															
													</div-->
													<div class="form-group">
															<label>No HP</label> 
															<input type="text"  name="hp" value=""placeholder="No Hp" class="form-control">
													</div>
													<div class="form-group">
															<label>Email</label> 
															<input type="email"  name="email" value=""placeholder="email" class="form-control">
													</div>
						 
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">save</button>
												</div>
											</div>
										</form>
									</div>  
								</div>
						
								<div class="table-responsive">
								<table class="table table-bordered data-table">
									<thead>
										<tr>
											<th>No</th>
											<th>Nik SAP</th>
											<th>Name</th>
											<th>Email</th>
											<th>HP</th>
											<th width="100px">Action</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$.ajaxSetup({

				  headers : {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				  }

			  });
 $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nik_sap', name: 'nik_sap'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'hp', name: 'hp'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
    /*$('body').on('click', '.deleteItem', function () {
		
        var Item_id = $(this).data("id");
        confirm("Are You sure want to delete !");
        $.ajax({
            type: "DELETE",
            url: "angkot/destroy/"+ Item_id,
            success: function (data) {
                window.location.href = "{{ url('/data/angkot') }}";
                alert("Data Karyawan Telah Terhapus");
            },
            error: function (data) {
            console.log('Error:', data);
        }
        });
    });   */
	$('body').on('click', '.deleteItem', function () {
		
        var Item_id = $(this).data("id");
		
		Swal.fire({
		  title: 'Anda Yakin?',
		  text: "Data yang dihapus Tidak bisa dikembalikan!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.isConfirmed) {
			$.ajax({
					type: "DELETE",
					url: "{{url('/data/karyawan/delete')}}"+'/'+ Item_id,
					success: function (data) {
					},
					error: function (data) {
					console.log('Error:', data);
				}
			});
			Swal.fire(
			  'Deleted!',
			  'Your file has been deleted.',
			  'success'
			)

		  }
		  			window.location.href = "{{ url('/karywan') }}";

		})
		
      
    });
</script>
@stop