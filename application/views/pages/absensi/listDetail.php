<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="table" class="table table-striped table-hover" style="width:100%">
            	<thead>
            	    <tr>
                        <th>Apakah hadir</th>
                        <th>Hari</th>
                        <th>Waktu</th>
            	        <th>Keterangan</th>
            	    </tr>
            	</thead>
            	<tbody></tbody>
            </table>
        </div>
    </div>
</div>

 <script type="text/javascript">

    $(document).ready(function() {
        //datatables
        let table = $('#table').DataTable({
            //ATUR POSISI TOMBOL & INFORMASI TABLE (PENJELASAN DI AKHIR2 VIDEO)
            'dom': '<"row dataTables_weecom"<"col-12 col-lg-4"f><"col-12 col-lg-3"l><"col-12 col-lg-5 toolbar text-right">><t><"row"<"col-6"i><"col-6"p>>',

        	//ambil data pakai ajax<lf<t>ip>
            'ajax': {
                'url': '<?php echo base_url('absensi/data/'); ?>',
                'type': 'POST'
            },
            //tambahkan data dari database ke table
            'columns': [
                {'data': 'apakah_hadir'},
                {'data': 'nama_hari'},
                {'data': 'waktu'},
                {'data': 'keterangan'}
            ],
            'columnDefs': [
                { 
                    'className': 'align-middle',
                    'targets'  : '_all' 
                }
            ]
        });

    });
</script>