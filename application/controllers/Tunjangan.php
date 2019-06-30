<?php

	class Tunjangan extends CI_Controller {

		private $template = 'templates/dashboard/template';

		public function __construct(){
			parent::__construct();

			apakahLoginRedirect();

			$this->load->model(['Tunjangan_model','Kategori_model']);
		}

        public function index($page = 'pages/tunjangan/list')
        {
			$data['title'] = 'Gaji & Tunjangan';
			$data['titleDashboard'] = 'Gaji & Tunjangan';
			$data['kontenDinamis'] = $page;
			
			$this->load->view($this->template, $data);        
        }

        public function add($page = 'pages/tunjangan/form'){
			$data['title'] = 'Tunjangan | Tambah';
			$data['titleDashboard'] = 'Setting Gaji & Tunjangan';
			$data['kontenDinamis'] = $page;
			$data['tombol'] = 'Create';
			$data['action'] = base_url('dashboard/gaji-dan-tunjangan/create');

			$data['status'] = array_combine($this->config->item('status'),
											$this->config->item('status'));

			$data['kategoriTunjangan'] = $this->Kategori_model
											  ->dropdownList('gjt');

			$this->load->view($this->template, $data);    
        }

        public function create(){
	    	$this->form_validation->set_rules('nama_karyawan', 'Karyawan', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	//panggil form tambah
	        	$this->add();
	        }
	        else{
	        	$data = ['id_karyawan'	=> $this->input->post('id_karyawan'),
	    				 'id_kategori'	=> $this->input->post('id_kategori'),
	    				 'nominal'		=> $this->input->post('nominal'),
	    				 'status'		=> $this->input->post('status'),
			             'dibuat'    	=> saatIni(),
			             'diganti'    	=> saatIni()
				        ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Tunjangan_model->create($data);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Data berhasil di tambahkan'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/gaji-dan-tunjangan');
	        }   
        }

        public function edit($id = 0, $page = 'pages/tunjangan/form'){
			$data['title'] = 'Tunjangan | Tambah';
			$data['titleDashboard'] = 'Setting Gaji & Tunjangan';
			$data['kontenDinamis'] = $page;
			$data['row'] = $this->Tunjangan_model->berdasarkanId($id)->row();
			$data['tombol'] = 'Update';
			$data['action'] = base_url('dashboard/gaji-dan-tunjangan/update/'.$id);

			$data['status'] = array_combine($this->config->item('status'),
											$this->config->item('status'));

			$data['kategoriTunjangan'] = $this->Kategori_model
											  ->dropdownList('gjt');

			$this->load->view($this->template, $data);    
        }

        public function update($id){
			$this->form_validation->set_rules('nama_karyawan', 'Karyawan', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	if(!$id){
		        	redirect('dashboard/departemen');
	        	}
	        
	        	//panggil form edit
	        	$this->edit($id);
	        }
	        else{
				$data = ['id_karyawan'	=> $this->input->post('id_karyawan'),
					    				 'id_kategori'	=> $this->input->post('id_kategori'),
					    				 'nominal'		=> $this->input->post('nominal'),
					    				 'status'		=> $this->input->post('status'),
							             'dibuat'    	=> saatIni(),
							             'diganti'    	=> saatIni()
								        ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Tunjangan_model->update($id, $data);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Data berhasil di update'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/gaji-dan-tunjangan');
	        }   
        }

		//data json untuk datatables
		public function data(){
			$rows = $this->Tunjangan_model->semua()->result();

			$dataTable['data'] = $rows;
			echo json_encode($dataTable);
		}        

	}