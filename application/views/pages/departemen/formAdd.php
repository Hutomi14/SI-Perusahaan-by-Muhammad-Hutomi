<div class="card frame-form-weecom">
	<div class="card-body">
    	<?php 
			$atribut = array('class' => 'form-weecom');
			echo form_open(base_url('departemen/create'), $atribut); 
		?>
	    <div class="form-group row">
	        <label for="nama_departemen" class="col-3 control-label">Nama Departemen</label>
	        <div class="col-9">
    			<?php 
					$data = array(
					        'type'  => 'text',
					        'name'  => 'nama_departemen',
					        'id'    => 'nama_departemen',
					        'class' => 'form-control',
					        'value' => set_value('nama_departemen'),
					        'placeholder' => 'Nama Departemen'
					);
					echo form_input($data);
					echo form_error('nama_departemen');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="status" class="col-3 control-label">Status</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array('class' => 'form-control');
					echo form_dropdown('status', $status, '', $atribut);
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
					echo form_submit($atribut, 'Create');
				?>
	        </div>
	    </div>

		<?php
			echo form_close();
		?>

	</div>
</div>	