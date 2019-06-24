<div class="container p-weecom">

	<div class="row h-75 align-items-center">
		
		<div class="col-12 col-md-7">
			<h2 class="title-register">Sistem Perusahaan Weecom</h2>
			<h3 class="title-register">Pengelolaan karyawan & digital absensi.</h3>

			<div class="akses-button">
				<?php
					$atribut = ['class' => 'btn btn-outline-primary active'];
					echo anchor('login#', 'LOGIN', $atribut);

					echo '&nbsp';

					$atribut = ['class' => 'btn btn-outline-primary'];
					echo anchor('register', 'REGISTER', $atribut);
				?>
			</div>
		</div>

		<div class="col-12 col-md-5">
			<div class="card frame-form-weecom">
				<div class="card-header">Login</div>

				<div class="card-body">
					<?php
						if($this->session->flashdata('pesan')){
							$alert = $this->session->flashdata('alert');
							echo '<div class="alert ' . $alert . '">' . $this->session->flashdata('pesan') . '</div>';
						}

		        		//mengeluarkan semua error
						// echo validation_errors();
						$attributes = array('class' => 'form-weecom');
						echo form_open(base_url('login/proses'), $attributes); 
					?>
   					<div class="form-group row">
				        <label for="email" class="col-3 control-label">Email</label>
				        <div class="col-9">
				        	<?php 
								$data = array(
								        'type'  => 'text',
								        'name'  => 'email',
								        'id'    => 'email',
								        'class' => 'form-control',
								        'value' => set_value('email'),
								        'placeholder' => 'Email'
								);
								echo form_input($data);

								echo form_error('email');
							?>
				        </div>
				    </div>
					<div class="form-group row">
					    <label for="password" class="col-3 control-label">Password</label>
					    <div class="col-9">
					    	<?php 
								$data = array(
								        'type'  => 'password',
								        'name'  => 'password',
								        'id'    => 'password',
								        'class' => 'form-control',
								        'placeholder' => 'Password'
								);
								echo form_input($data);
								echo form_error('password');
							?>
					    </div>
					</div>

					    <button type="submit" class="btn btn-dark btn-block">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>