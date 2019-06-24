<div class="container-fluid p-weecom">
	<div class="row align-items-center">
	
		<div class="col-12 col-md-6">
			<h2 class="title-register">Sistem Perusahaan Weecom</h2>
			<h3 class="title-register">Pengelolaan karyawan & digital absensi.</h3>

			<div class="akses-button">
				<?php
					$atribut = ['class' => 'btn btn-outline-primary'];
					echo anchor('login', 'LOGIN', $atribut);

					echo '&nbsp';

					$atribut = ['class' => 'btn btn-outline-primary active'];
					echo anchor('register#', 'REGISTER', $atribut);
				?>
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="card frame-form-weecom">
				<div class="card-header">Daftar Interview</div>

				<div class="card-body">
		        	<?php 
		        		//mengeluarkan semua error
						// echo validation_errors();

						$atribut = array('class' => 'form-weecom');
						echo form_open(base_url('register/proses'), $atribut); 
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
								        'value' => set_value('nama_depan'),
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
								        'value' => set_value('nama_belakang'),
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
								        'value' => set_value('email'),
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
								        'value' => set_value('dob'),
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
								        'value' => set_value('alamat'),
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
								        'value' => set_value('nomor_telepon'),
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
								        'value' => set_value('nomor_hp'),
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
										        'checked'	=>	set_radio('jenis_kelamin', 'Wanita')
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
										        'checked'	=>	set_radio('jenis_kelamin', 'Pria')
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
				        <label for="password" class="col-3 control-label">Password</label>
				        <div class="col-9">
				        	<?php 
								$atribut = array(
								        'type'  => 'password',
								        'name'  => 'password',
								        'id'    => 'password',
								        'class' => 'form-control',
								        'placeholder' => 'Password'
								);
								echo form_input($atribut);
								echo form_error('password');
							?>
				        </div>
				    </div>
				    <div class="form-group row">
				        <label for="konfirmasi_password" class="col-3 control-label">Konfrimasi Password</label>
				        <div class="col-9">
				      		<?php 
								$atribut = array(
								        'type'  => 'password',
								        'name'  => 'konfirmasi_password',
								        'id'    => 'konfirmasi_password',
								        'class' => 'form-control',
								        'placeholder' => 'Konfrimasi Password'
								);
								echo form_input($atribut);
								echo form_error('konfirmasi_password');
							?>
				        </div>
				    </div>

		    		<?php 
						$atribut = array(
						        'name'  => 'submit',
						        'class' => 'btn btn-dark btn-block'
						);
						echo form_submit($atribut, 'Register');
					
						echo form_close();
					?>

				</div>
			</div>
		</div>

	</div>
</div>