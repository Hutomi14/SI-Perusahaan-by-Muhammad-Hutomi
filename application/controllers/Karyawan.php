<?php

	class Karyawan extends CI_Controller {

		private $template = 'templates/dashboard/main';

		public function __construct(){
			parent::__construct();
			apakahLoginRedirect();

			$this->load->model('Karyawan_model');
			$this->load->model('Departemen_model');
			$this->load->model('Posisi_model');
		}

        public function index($page = 'pages/karyawan/list')
        {
			$data['title'] = 'Karyawan';
			$data['titleDashboard'] = 'Karyawan';
			$data['kontenDinamis'] = $page;
			
			$this->load->view($this->template, $data);        
        }

        public function edit($id = 0, $page = 'pages/karyawan/formEdit'){
			$data['title'] = 'Module Karyawan | Edit';
			$data['titleDashboard'] = 'Karyawan';
			$data['kontenDinamis'] = $page;
			$data['row'] = $this->Karyawan_model->melaluiId($id)->row();

			$data['departemen'] = $this->Departemen_model->dropdownList();
			$data['posisi'] = $this->Posisi_model->dropdownList();
			$data['status'] = array_combine($this->config->item('statusUser'), $this->config->item('statusUser'));

			$this->load->view($this->template, $data);    
        }

        public function update($id){
	    	$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
	    	$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
	    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[karyawan.email]');
	    	$this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required');
	    	$this->form_validation->set_rules('alamat', 'alamat', 'required');
	    	$this->form_validation->set_rules('nomor_telepon', 'nomor_telepon', 'numeric');
	    	$this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required|numeric');
	    	$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	if(!$id){
		        	redirect('dashboard/karyawan');
	        	}
	        
	        	//panggil form edit
	        	$this->edit($id);
	        }
	        else{
	        	$dataRegister = ['nama_depan'		=> $this->input->post('nama_depan'),
				                 'nama_belakang'    => $this->input->post('nama_belakang'),
				                 'email'            => $this->input->post('email'),
				                 'dob'            	=> $this->input->post('dob'),
				                 'nomor_telepon'    => $this->input->post('nomor_telepon'),
				                 'nomor_hp'    		=> $this->input->post('nomor_hp'),
				                 'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
				                 'alamat'   		=> $this->input->post('alamat'),
				                 'id_departemen'    => $this->input->post('id_departemen'),
				                 'id_posisi'    	=> $this->input->post('id_departemen'),
				                 'status'    	=> $this->input->post('status'),
				                 'diganti'    		=> saatIni()
				             	];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Karyawan_model->update($id, $dataRegister);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Akun '. $this->input->post('nama_depan') .' '. $this->input->post('nama_belakang') .' berhasil di update'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/karyawan');
	        }   
        }

		//data json untuk datatables
		public function data(){
			$rows = $this->Karyawan_model->semua()->result();

			$dataTable['data'] = $rows;
			echo json_encode($dataTable);
		}

        //CUMA UNTUK ISI DATA
  //       public function faker(){
  //       	$masalahWindows = str_replace("\\", "/", APPPATH);

		// 	include $masalahWindows."third_party/Faker-master/faker/autoload.php";
			
		// 	$batas = 200;

		// 	$faker = Faker\Factory::create('en_HK');
		// 	$faker->seed($batas);

		// 	for ($i = 0; $i < $batas; $i++) {
		// 		$dataRegister[] = ['nama_depan'		=> $faker->firstName,
		// 		                 'nama_belakang'    => $faker->lastName,
		// 		                 'email'            => $faker->email,
		// 		                 'dob'            	=> $faker->dateTimeThisCentury->format('Y-m-d'),
		// 		                 'nomor_telepon'    => $faker->phoneNumber,
		// 		                 'nomor_hp'    		=> $faker->phoneNumber,
		// 		                 'jenis_kelamin'    => $faker->randomElement(['Pria', 'Wanita']),
		// 		                 'alamat'    		=> $faker->address,
		// 		                 'password'    		=> $faker->password,
		// 		                 'dibuat'    		=> saatIni(),
		// 		                 'diganti'    		=> saatIni(),
		// 		                 'id_departemen'    => 1,
		// 		                 'id_posisi'    	=> 1 
		// 		             	];
		// 	}

		// 	//hanya faker, jadi langsung di kontroller
		// 	$this->db->insert_batch('karyawan', $dataRegister);
		// }

	}