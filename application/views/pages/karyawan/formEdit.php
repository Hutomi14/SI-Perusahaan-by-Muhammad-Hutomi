<div class="card frame-form-weecom">
	<div class="card-body">
    	<?php 
    		//mengeluarkan semua error
			// echo validation_errors();

			$atribut = array('class' => 'form-weecom');
			echo form_open(base_url('karyawan/update/'.$row->id), $atribut); 
		?>
	    <div class="form-group row">
	        <label for="nama_depan" class="col-3 control-label">Nama Depan</label>
	        <div class="col-9">
    			<?php 
					$data = array(
					        'type'  => 'text',
					        'name'  => 'nama_depan',
					        'id'    => 'nama_depan',
					        'class' => 'form-control',
					        'value' => set_value('nama_depan', $row->nama_depan),
					        'placeholder' => 'Nama Depan'
					);
					echo form_input($data);
					
					//tampilkan error
					echo form_error('nama_depan', '<div class="text-danger">', '</div>');
				?>

	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="nama_belakang" class="col-3 control-label">Nama Belakang</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array(
					        'type'  => 'text',
					        'name'  => 'nama_belakang',
					        'id'    => 'nama_belakang',
					        'class' => 'form-control',
					        'value' => set_value('nama_belakang', $row->nama_belakang),
					        'placeholder' => 'Nama Belakang'
					);
					echo form_input($atribut);

					//bikin delimeter untuk semua error
					//bikin file form_validation di config
					//load di config/autoload
					echo form_error('nama_belakang');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="email" class="col-3 control-label">Email</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array(
					        'type'  => 'text',
					        'name'  => 'email',
					        'id'    => 'email',
					        'class' => 'form-control',
					        'value' => set_value('email', $row->email),
					        'placeholder' => 'Email'
					);
					echo form_input($atribut);

					echo form_error('email');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="dob" class="col-3 control-label">Tanggal Lahir</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array(
					        'type'  => 'text',
					        'name'  => 'dob',
					        'id'    => 'dob',
					        'class' => 'form-control datepicker',
					        'readonly' => true,
					        'value' => set_value('dob', $row->dob),
					        'placeholder' => 'Tanggal Lahir'
					);
					echo form_input($atribut);
					echo form_error('dob');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="alamat" class="col-3 control-label">Alamat</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array(
					        'type'  => 'text',
					        'name'  => 'alamat',
					        'id'    => 'alamat',
					        'class' => 'form-control',
					        'value' => set_value('alamat', $row->alamat),
					        'placeholder' => 'Masukan alamat rumah kamu'
					);
					echo form_input($atribut);
					echo form_error('alamat');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="nomor_telepon" class="col-3 control-label">Nomor Telepon</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array(
					        'type'  => 'number',
					        'name'  => 'nomor_telepon',
					        'id'    => 'nomor_telepon',
					        'class' => 'form-control',
					        'value' => set_value('nomor_telepon', $row->nomor_telepon),
					        'placeholder' => 'Masukan nomor telepon rumah kamu'
					);
					echo form_input($atribut);
					echo form_error('nomor_telepon');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="nomor_hp" class="col-3 control-label">Nomor Hp</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array(
					        'type'  => 'number',
					        'name'  => 'nomor_hp',
					        'id'    => 'nomor_hp',
					        'class' => 'form-control',
					        'value' => set_value('nomor_hp', $row->nomor_hp),
					        'placeholder' => 'Masukan nomor handphone kamu'
					);
					echo form_input($atribut);
					echo form_error('nomor_hp');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label class="control-label col-3">Jenis Kelamin</label>
	        <div class="col-9">
	            <div class="row">
	                <div class="col-4">
	                    <label class="radio-inline">
	                    	<?php 
								$atribut = array(
							        'name' 		=>	'jenis_kelamin',
							        'value'		=>	'Wanita',
							        'checked'	=>	set_radio('jenis_kelamin', 'Wanita', $row->jenis_kelamin == 'Wanita')
								);
								echo form_radio($atribut, 'Wanita');
							?>
	                        Wanita
	                    </label>
	                </div>
	                <div class="col-4">
	                    <label class="radio-inline">
	                    	<?php 
								$atribut = array(
							        'name'  => 'jenis_kelamin',
							        'value'		=>	'Pria',
							        'checked'	=>	set_radio('jenis_kelamin', 'Pria', $row->jenis_kelamin == 'Pria')
								);
								echo form_radio($atribut, 'Pria');
							?>
	                        Pria
	                    </label>
	                </div>
	            </div>
	            <?php echo form_error('jenis_kelamin'); ?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="departemen" class="col-3 control-label">Departemen</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array('class' => 'form-control');
					echo form_dropdown('departemen', $departemen, $row->id_departemen, $atribut);
					echo form_error('departemen');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="posisi" class="col-3 control-label">Posisi</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array('class' => 'form-control');
					echo form_dropdown('posisi', $posisi, $row->id_posisi, $atribut);
					echo form_error('posisi');
				?>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label for="status" class="col-3 control-label">Status</label>
	        <div class="col-9">
	        	<?php 
					$atribut = array('class' => 'form-control');
					echo form_dropdown('status', $status, $row->status, $atribut);
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
					echo form_submit($atribut, 'Update');
				?>
	        </div>
	    </div>

		<?php
			echo form_close();
		?>
	</div>
</div>	