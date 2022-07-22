 <table class="table table-hover mt-5">
        <thead>
            <tr>
				<th>No ID</th>
				<th>NIK SAP</th>
				<th>Name</th>
				<th>Masuk</th>
				<th>Keluar</th>
				<th>Jabatan</th>
				<th>Departemen</th>
 
            </tr>
        </thead>
        <tbody>
			
            @foreach ($format as $format1)
                  <tr>
                        
                        <td>{{$format1->no_id}}</td>
                        <td>{{$format1->nik_sap}}</td>
                        <td>{{$format1->nama}}</td>
                        <td>{{$format1->masuk}}</td>
                        <td>{{$format1->keluar}}</td>
                        <td>{{$format1->jabatan}}</td>
                        <td>{{$format1->departemen}}</td>

                  </tr>
            @endforeach
        </tbody> 
    </table> 
	
	
