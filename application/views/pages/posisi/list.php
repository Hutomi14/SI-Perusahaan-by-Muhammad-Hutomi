<table id="table" class="table table-striped table-hover">
	<thead>
	    <tr>
	        <th>Posisi</th>
	        <th>Status</th>
	        <th>&nbsp;</th>
	    </tr>
	</thead>
	<tbody></tbody>
</table>

 <script type="text/javascript">

    $(document).ready(function() {
        //datatables
        $('#table').DataTable({
            //ATUR POSISI TOMBOL & INFORMASI TABLE (PENJELASAN DI AKHIR2 VIDEO)
            'dom': '<"row dataTables_weecom"<"col-12 col-lg-4"f><"col-12 col-lg-3"l><"col-12 col-lg-5 toolbar text-right">><t><"row"<"col-6"i><"col-6"p>>',

        	//ambil data pakai ajax
            'ajax': {
                'url': '<?php echo base_url('posisi/data'); ?>',
                'type': 'POST'
            },
            //tambahkan data dari database ke table
            'columns': [
                {'data': 'nama_posisi'},
                {'data': 'status'}
            ],
            'columnDefs': [
                {
                	//bikin tombol
                    'render': function (data, type, row ) {
                    	let btnEdit = '<a class="btn btn-dark btn-sm" href="<?php echo base_url('dashboard/posisi/edit/'); ?>'+row.id+'">EDIT</a>';

                        return btnEdit;
                    },
                    'targets': 2
                },
				{ 
					'className': 'align-middle',
					'targets'  : '_all' 
				}
            ]
        });

        let tombolTambah = '<a class="btn btn-success btn-sm" href="<?php echo base_url('dashboard/posisi/add/'); ?>">+ Posisi</a>';
        $("div.toolbar").html(tombolTambah);
    });
</script>