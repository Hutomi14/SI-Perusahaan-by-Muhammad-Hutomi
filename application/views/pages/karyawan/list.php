<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="table" class="table table-striped table-hover" style="width:100%">
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
                    	let btnEdit = '<a class="btn btn-dark btn-sm" href="<?php echo base_url('dashboard/karyawan/edit/'); ?>'+row.id+'">EDIT</a>';

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