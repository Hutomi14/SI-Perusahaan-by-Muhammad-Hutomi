<?php $this->load->view('templates/header'); ?>

	<div class="container-fluid">	

		<div class="row">
			<div class="col-12 col-sm-2 bg-dark p-0 ">
				<nav class="sidebar">
		            <ul>
		                <li> <label class="info-nama">Hi <?php echo $this->session->userdata('nama_depan'); ?></label> </li>
		                <li> <?php echo anchor('dashboard', 'Dashboard', ['class' => menuAktif('dashboard')]); ?> </li>
		                <li> <?php echo anchor('dashboard/karyawan', 'Karyawan', ['class' => menuAktif('dashboard/karyawan')]); ?> </li>
		                <li> <?php echo anchor('dashboard/tunjangan', 'Tunjangan', ['class' => menuAktif('dashboard/tunjangan')]); ?> </li>
		                <li> <?php echo anchor('dashboard/absensi', 'Absensi', ['class' => menuAktif('dashboard/absensi')]); ?> </li>
		                <li> <?php echo anchor('dashboard/posisi', 'Posisi', ['class' => menuAktif('dashboard/posisi')]); ?> </li>
		                <li> <?php echo anchor('dashboard/departemen', 'Departemen', ['class' => menuAktif('dashboard/departemen')]); ?> </li>
		                <li> <?php echo anchor('logout', 'Logout'); ?> </li>
		            </ul>
			    </nav>
			</div>

			<div class="col-12 col-sm-10 p-weecom">
				<?php
				    if($this->session->flashdata('pesan')){
				        $alert = $this->session->flashdata('alert');
				        echo '<div class="alert ' . $alert . '">' . $this->session->flashdata('pesan') . '</div>';
				    }
				?>
				
				<h3 class="dashboard"><?php echo $titleDashboard; ?></h3>
				<?php
					//ini yang akan membuat konten di dalam dashboard berubah-ubah
					$this->load->view($kontenDinamis);
				?>
			</div>
		</div>

	</div>

<?php $this->load->view('templates/akhir-html'); ?>