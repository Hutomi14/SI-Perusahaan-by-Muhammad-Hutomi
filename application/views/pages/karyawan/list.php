<table id="table" class="table table-striped table-hover">
	<thead>
	    <tr>
	        <th>Nama Lengkap</th>
	        <th>Jenis Kelamin</th>
	        <th>Email</th>
	        <th>Handphone</th>
	        <th>&nbsp;</th>
	    </tr>
	</thead>
	<tbody></tbody>
</table>

 <script type="text/javascript">

    $(document).ready(function() {
        //datatables
        $('#table').DataTable({
        	//ambil data pakai ajax
            'ajax': {
                'url': '<?php echo base_url('karyawan/data'); ?>',
                'type': 'POST'
            },
            //tambahkan data dari database ke table
            'columns': [
                {'data': 'nama_depan'},
                {'data': 'jenis_kelamin'},
                {'data': 'email'},
                {'data': 'nomor_hp'}
            ],
            'columnDefs': [
                {
                	//gabungin nama depan dan nama belakang
                    'render': function ( data, type, row ) {
                        return row.nama_depan + ' ' + row.nama_belakang;
                    },
                    'targets': 0 //target kolom yg diinginkan, kolom pertama dimulai dari 0
                },
                {
                	//bikin tombol
                    'render': function (data, type, row ) {
                    	let btnEdit = '<a class="btn btn-info btn-sm" href="<?php echo base_url('dashboard/karyawan/edit/'); ?>'+row.id+'">EDIT</a>';

                        return btnEdit;
                    },
                    'targets': 4
                },
				{ 
					'className': 'align-middle',
					'targets'  : '_all' 
				}
            ]
        });
    });
</script>