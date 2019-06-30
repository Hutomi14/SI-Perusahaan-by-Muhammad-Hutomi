<div class="card frame-form-weecom">
	<div class="card-body">
    	<?php 
			$atribut = array('class' => 'form-weecom');
			echo form_open($action, $atribut); 
		?>
	    <div class="form-group row">
	        <label for="nama_karyawan" class="col-3 control-label">Nama Karyawan</label>
	        <div class="col-9">
    			<?php 
					$data = array(
					        'type'  => 'text',
					        'name'  => 'nama_karyawan',
					        'id'    => 'nama_karyawan',
					        'class' => 'form-control',
					        'value' => set_value('nama_karyawan', isset($row->nama_depan) ? $row->nama_depan.' '.$row->nama_belakang : ''),
					        'placeholder' => 'Nama Karyawan'
					);
					echo form_input($data);
					echo form_error('nama_karyawan');
					
					$data = array(
						    'type'  => 'hidden',
						    'name'  => 'id_karyawan',
						    'id'    => 'id_karyawan',
						    'value' => set_value('id_karyawan', $row->id_karyawan ?? '')
					);
					echo form_input($data);
				?>
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="kategori" class="col-3 control-label">Kategori</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array('class' => 'form-control');
					echo form_dropdown('id_kategori', $kategoriTunjangan, $row->id_kategori ?? '', $atribut);
					echo form_error('kategori');
				?>
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="nominal" class="col-3 control-label">Nominal</label>
	        <div class="col-9 input-group">
				<div class="input-group-prepend">
					<div class="input-group-text">Rp</div>
				</div>
				 <?php 
					$data = array(
					        'type'  => 'number',
					        'name'  => 'nominal',
					        'id'    => 'nominal',
					        'class' => 'form-control',
					        'value' => set_value('nominal', $row->nominal ?? ''),
					        'placeholder' => 'Nominal dalam gaji atau tunjangan'
					);
					echo form_input($data);
					echo form_error('nominal');
				?>
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="status" class="col-3 control-label">Status</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array('class' => 'form-control');
					echo form_dropdown('status', $status, $row->status ?? '', $atribut);
					echo form_error('status');
				?>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-9 col-9 ml-auto">	    
				<?php 
					$atribut = array(
					        'name'  => 'submit',
					        'class' => 'btn btn-dark btn-block'
					);
					echo form_submit($atribut, $tombol);
				?>
	        </div>
	    </div>

		<?php
			echo form_close();
		?>

	</div>
</div>	

<script type="text/javascript">
	$(document).ready(function(){	 
		$("#nama_karyawan").autocomplete({
	      	source: '<?php echo base_url('karyawan/search'); ?>',
	      	focus: function( event, ui ) {
		        $( "#nama_karyawan" ).val(ui.item.nama_depan +" "+ ui.item.nama_belakang);
		        $( "#id_karyawan" ).val( ui.item.id);
		        return false;
		    },
		    select: function( event, ui ) {
		        $( "#nama_karyawan" ).val(ui.item.nama_depan +" "+ ui.item.nama_belakang);
		        $( "#id_karyawan" ).val( ui.item.id);
		        return false;
		    }
	    })
	    .autocomplete( "instance" )._renderItem = function( ul, item ) {
	      return $( "<li>" )
	        .append( "<div>" + item.nama_depan + " " + item.nama_belakang + "</div>" )
	        .appendTo( ul );
	    };
    });
</script>