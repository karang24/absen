 <table class="table table-hover mt-5">
        <thead>
            <tr>
                <th>id_karyawan</th>
                <th>no_id</th>
                <th>nik_sap</th>
                <th>nama</th>
                <th>id_departemen</th>
                <th>id_jabatan</th>
                <th>departemen</th>
                <th>Periode</th>
                <th>Tahun</th>
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
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
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
                <th>BULAN</th>
                <th>ID User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($format as $format1)
                  <tr>
                        <td>{{ $format1->id_karyawan }}</td>
                        <td>{{ $format1->no_id }}</td>
                        <td>{{ $format1->nik_sap }}</td>
                        <td>{{ $format1->nama }}</td>
                        <td>{{ $format1->id_departemen }}</td>
                        <td>{{ $format1->id_jabatan }}</td>
                        <td>{{ $format1->departemen }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{session('id_user')}}</td>
                  </tr>
            @endforeach
        </tbody> 
    </table> 
	
	
