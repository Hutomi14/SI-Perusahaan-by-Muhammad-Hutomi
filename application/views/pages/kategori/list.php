<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="table" class="table table-striped table-hover" style="width:100%">
            	<thead>
            	    <tr>
            	        <th>Kategori</th>
                        <th>Tipe</th>
            	        <th>Status</th>
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
        $('#table').DataTable({
            //ATUR POSISI TOMBOL & INFORMASI TABLE (PENJELASAN DI AKHIR2 VIDEO)
            'dom': '<"row dataTables_weecom"<"col-12 col-lg-4"f><"col-12 col-lg-3"l><"col-12 col-lg-5 toolbar text-right">><t><"row"<"col-6"i><"col-6"p>>',

        	//ambil data pakai ajax
            'ajax': {
                'url': '<?php echo base_url('kategori/data'); ?>',
                'type': 'POST'
            },
            //tambahkan data dari database ke table
            'columns': [
                {'data': 'nama_kategori'},
                {'data': 'tipe'},
                {'data': 'status'}
            ],
            'columnDefs': [
                {
                	//bikin tombol
                    'render': function (data, type, row ) {
                    	let btnEdit = '<a class="btn btn-dark btn-sm" href="<?php echo base_url('dashboard/administrasi/kategori/edit/'); ?>'+row.id+'">EDIT</a>';

                        return btnEdit;
                    },
                    'targets': 3
                },
				{ 
					'className': 'align-middle',
					'targets'  : '_all' 
				}
            ]
        });

        let tombolTambah = '<a class="btn btn-success btn-sm" href="<?php echo base_url('dashboard/administrasi/kategori/add/'); ?>">+ Kategori</a>';
        $("div.toolbar").html(tombolTambah);
    });
</script>