<div class="row">
    <div class="col-12 text-right">
        <?php 
            $atribut = ['class' => 'btn btn-primary btn-sm btn-tambah'];
            echo anchor('dashboard/departemen/add', '+ Tambah Departemen', $atribut);
        ?>
    </div>    
</div>

<table id="table" class="table table-striped table-hover">
	<thead>
	    <tr>
	        <th>Departemen</th>
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

        	//ambil data pakai ajax
            'ajax': {
                'url': '<?php echo base_url('departemen/data'); ?>',
                'type': 'POST'
            },
            //tambahkan data dari database ke table
            'columns': [
                {'data': 'nama_departemen'},
                {'data': 'status'}
            ],
            'columnDefs': [
                {
                	//bikin tombol
                    'render': function (data, type, row ) {
                    	let btnEdit = '<a class="btn btn-info btn-sm" href="<?php echo base_url('dashboard/departemen/edit/'); ?>'+row.id+'">EDIT</a>';

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
    });
</script>