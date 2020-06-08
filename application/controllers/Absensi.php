<?php

	class Absensi extends CI_Controller {

		private $template = 'templates/dashboard/template.php';

		public function __construct(){
			parent::__construct();
			apakahLoginRedirect();

			$this->load->model(['Karyawan_model','Absensi_model']);
		}

        public function index($page = 'pages/absensi/list')
        {
			$data['title'] = 'Absensi';
			$data['titleDashboard'] = 'Absensi';
			$data['kontenDinamis'] = $page;
			
			$this->load->view($this->template, $data);        
        }

        public function detail($id, $page = 'pages/absensi/listDetail')
        {
			$data['title'] = 'Absensi';
			$data['titleDashboard'] = 'Absensi';
			$data['kontenDinamis'] = $page;
			$data['id'] = $id;

			$this->load->view($this->template, $data);        
        }

        public function edit($id = 0, $page = 'pages/absensi/form'){
			$data['title'] = 'Karyawan | Edit';
			$data['titleDashboard'] = 'Karyawan';
			$data['kontenDinamis'] = $page;
			$data['row'] = $this->Karyawan_model->berdasarkanId($id)->row();

			$data['departemen'] = $this->Departemen_model->dropdownList();
			$data['posisi'] = $this->Posisi_model->dropdownList();
			$data['status'] = array_combine($this->config->item('statusUser'), $this->config->item('statusUser'));

			$this->load->view($this->template, $data);    
        }

        public function update($id){
	    	$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
	    	$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
	    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_unique_email['.$id.']');
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
				                 'id_departemen'    => $this->input->post('departemen'),
				                 'id_posisi'    	=> $this->input->post('posisi'),
				                 'status'    		=> $this->input->post('status'),
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
			$rows = $this->Absensi_model->semua()
										 ->result();

			$dataTable['data'] = $rows;
			echo json_encode($dataTable);
		}

		public function unique_email($input, $id){
			$row = $this->Karyawan_model->berdasarkanEmail($input)
										->row();

			if($row){			
				if($row->id != $id){
					$this->form_validation->set_message('unique_email', 'Sudah ada yang daftar dengan email '.$input);
					return FALSE;
				}
				else{
					return TRUE;
				}
			}

			return TRUE;
		}

        // CUMA UNTUK ISI DATA
	 //    public function faker(){			
		// 	$batas = 30;
		// 	$dataRegister = array();
		// 	for ($i = 1; $i < $batas; $i++) {
		// 		$dataRegister[] = ['id_karyawan'	=> 203,
		// 						   'apakah_hadir'	=> 1,
		// 						   'waktu'			=> "2019-06-$i 06:35:10"];
		// 	}

		// 	//hanya faker, jadi langsung di kontroller
		// 	$this->db->insert_batch('absensi', $dataRegister);
		// }

	}