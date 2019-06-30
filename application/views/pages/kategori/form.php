<div class="card frame-form-weecom">
	<div class="card-body">
    	<?php 
			$atribut = array('class' => 'form-weecom');
			echo form_open($action, $atribut); 
		?>
	    <div class="form-group row">
	        <label for="tipe" class="col-3 control-label">Nama Kategori</label>
	        <div class="col-9">
    			<?php 
					$data = array(
					        'type'  => 'text',
					        'name'  => 'tipe',
					        'id'    => 'tipe',
					        'class' => 'form-control',
					        'value' => set_value('tipe', $row->tipe ?? ''),
					        'placeholder' => 'Tipe Kategori'
					);
					echo form_input($data);
					echo form_error('tipe');
				?>
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="nama_kategori" class="col-3 control-label">Nama Kategori</label>
	        <div class="col-9">
    			<?php 
					$data = array(
					        'type'  => 'text',
					        'name'  => 'nama_kategori',
					        'id'    => 'nama_kategori',
					        'class' => 'form-control',
					        'value' => set_value('nama_kategori', $row->nama_kategori ?? ''),
					        'placeholder' => 'Nama Kategori'
					);
					echo form_input($data);
					echo form_error('nama_kategori');
				?>
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="keterangan" class="col-3 control-label">Keterangan</label>
	        <div class="col-9">
    			<?php 
					$data = array(
					        'type'  => 'text',
					        'name'  => 'keterangan',
					        'id'    => 'keterangan',
					        'class' => 'form-control',
					        'value' => set_value('keterangan', $row->keterangan ?? ''),
					        'placeholder' => 'Berikan keterangan tentang kategori ini'
					);
					echo form_textarea($data);
					echo form_error('keterangan');
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