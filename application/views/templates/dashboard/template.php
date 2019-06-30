<?php $this->load->view('templates/open'); ?>
	<div class="dashboard">	

		<nav id="sidebar" class="bg-dark">
            <ul class="menu list-tanpa-style">
                <li class="<?php echo menuAktif('dashboard') ?>"> <?php echo anchor('dashboard', 'Dashboard'); ?> </li>
                <li class="<?php echo menuAktif('karyawan') ?>"> <?php echo anchor('dashboard/karyawan', 'Karyawan'); ?> </li>
                <li class="<?php echo menuAktif('tunjangan') ?>"> <?php echo anchor('dashboard/gaji-dan-tunjangan', 'Gaji & Tunjangan'); ?> </li>
                <li class="<?php echo menuAktif('absensi') ?>"> <?php echo anchor('dashboard/absensi', 'Absensi'); ?></li>
                <li class="<?php echo menuAktif('posisi') ?>"> <?php echo anchor('dashboard/posisi', 'Posisi'); ?> </li>
                <li class="<?php echo menuAktif('departemen') ?>"> <?php echo anchor('dashboard/departemen', 'Departemen'); ?> </li>
                <li>
                    <a href="#homeSubmenu" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false">Administrasi</a>
                    <ul class="list-tanpa-style collapse" id="homeSubmenu">
                        <li class="<?php echo menuAktif('kategori') ?>"> <?php echo anchor('dashboard/administrasi/kategori', 'Kategori'); ?>
                        </li>
                    </ul>
                </li>
                <li> <?php echo anchor('logout', 'Logout'); ?> </li>
            </ul>
	    </nav>

		<div id="content">
            <nav class="navbar navbar-expand bg-light">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-dark">
                    <i class="fa fa-align-justify"></i>
                </button>
                <a class="navbar-brand logo-dashboard" href="#">WEECOM</a>
            </nav>

            <div class="container-fluid">
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

<?php $this->load->view('templates/close'); ?>