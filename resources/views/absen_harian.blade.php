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
						   <center><h4>Daftar Absensi</h4></center>
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
						 	<a href="{{url('/absen/download')}}" class="btn btn-success my-3" target="_blank">Download</a>

						 
							<div class="table-responsive">
								<table class="table table-bordered data-table">
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Tanggal</th>
											<th>Masuk</th>
											<th>Keluar</th>
											<th>Jabatan</th>
											<th>Departemen</th>
											<th width="100px">Action</th>
										</tr>
									</thead>
									<div class="form-group row">
												<div class="col-sm-3">
													<input  data-column="2"  class="form-control tanggal" value="{{ date('Y-m-d') }}" name="tanggal" id="tanggal" type="date" >
															
												</div>
												
												
												<div class="col-sm-2">
													<button class="btn btn-success filter"> Cari </button>
												</div>
									</div>
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
	
	
	$(document).ready(function() {

        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('data.absen.get') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'masuk', name: 'masuk'},
            {data: 'keluar', name: 'keluar'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'departemen', name: 'departemen'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
		
			
				table.column($('.tanggal').data('column'))
				.search( $('.tanggal').val() )
				.draw();

	$('.filter').click(function () {
			//	console.log($('.tanggal').data('column') );
			var tgl = $('.tanggal').val();
			console.log(tgl);
			$.ajax({
				  url :"{{url('/sesion_tgl')}}",
				  type: 'POST',
				  data: {'tgl':tgl},      
				  dataType: 'json',
				  success:function(r){

				  
				  }
			  });
				table.column($('.tanggal').data('column'))
				.search( $('.tanggal').val() )
				.draw();
			});
		
    });
	
		

</script>
@stop