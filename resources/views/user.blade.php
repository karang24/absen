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
						   <center><h4>Daftar User</h4></center>
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
							<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
									Add User
							</button>
						 
						</div>
						
								<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<form method="POST" action="{{url('/user/add')}}" enctype="multipart/form-data">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
												</div>
												<div class="modal-body">
						 
													{{ csrf_field() }}
						 
													<label>Nama</label>
													<div class="form-group">
														<input type="text" class="form-control" name="nama" required="required">
													</div>
													<label>Password</label>
													<div class="form-group">
														<input type="password" class="form-control" name="password" required="required">
													</div>
													<label>Email</label>
													<div class="form-group">
														<input type="email" class="form-control" name="email" required="required">
													</div>
													<label>Role</label>
													<div class="form-group">
														<select class="form-control" name="role"  >
															@if (session('id_role') == 1 )	

																@foreach ($role as $roles) 
																	<option value="{{$roles->id}}" >{{$roles->role}}</option> 
																@endforeach
															@else
																@foreach ($role->where('id',3) as $roles) 
																	<option value="{{$roles->id}}" >{{$roles->role}}</option> 
																@endforeach
															@endif
														
														</select>
													</div>
													<label>Karyawan</label>
													<div class="form-group">
														<select class="form-control" name="id_karyawan"  >
																																																<option value="0" >-</option> 
																@foreach ($karyawan as $karyawans) 
																	<option value="{{$karyawans->id}}" >{{$karyawans->nama}}</option> 
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
						 
						 
							<div class="table-responsive">
								<table class="table table-bordered data-table">
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Role</th>
		
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
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>
        </div>
        
        <div id="right-sidebar" class="animated">
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
        ajax: "{{ route('data.penguna.get') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'role', name: 'role'}, 

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
   
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
					url: "{{url('/data/user/delete')}}"+'/'+ Item_id,
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
		  			window.location.href = "{{ url('/user') }}";

		})
		
      
    });
	</script>
@stop