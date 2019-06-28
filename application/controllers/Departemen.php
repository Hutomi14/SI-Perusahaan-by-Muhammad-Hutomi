<?php

	class Departemen extends CI_Controller {

		private $template = 'templates/dashboard/template';

		public function __construct(){
			parent::__construct();
			apakahLoginRedirect();

			$this->load->model('Departemen_model');
		}

        public function index($page = 'pages/departemen/list')
        {
			$data['title'] = 'Departemen';
			$data['titleDashboard'] = 'Departemen';
			$data['kontenDinamis'] = $page;
			
			$this->load->view($this->template, $data);        
        }

        public function add($page = 'pages/departemen/formAdd'){
			$data['title'] = 'Module Deparetemen | Tambah';
			$data['titleDashboard'] = 'Deparetemen';
			$data['kontenDinamis'] = $page;

			$data['status'] = array_combine($this->config->item('status'),
											$this->config->item('status'));

			$this->load->view($this->template, $data);    
        }

        public function create(){
	    	$this->form_validation->set_rules('nama_departemen', 'Nama Deparetemen', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	//panggil form tambah
	        	$this->add();
	        }
	        else{
	        	$dataPosisi = ['nama_departemen'=> $this->input->post('nama_departemen'),
	        				   'status'		=> $this->input->post('status'),
				               'dibuat'    => saatIni(),
				               'diganti'    => saatIni()
				              ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Departemen_model->create($dataPosisi);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Data posisi berhasil di tambahkan'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/departemen');
	        }   
        }

        public function edit($id = 0, $page = 'pages/departemen/formEdit'){
			$data['title'] = 'Module Posisi | Edit';
			$data['titleDashboard'] = 'Posisi';
			$data['kontenDinamis'] = $page;
			$data['row'] = $this->Departemen_model->melaluiId($id)->row();

			$data['status'] = array_combine($this->config->item('status'),
											$this->config->item('status'));

			$this->load->view($this->template, $data);    
        }

        public function update($id){
	    	$this->form_validation->set_rules('nama_departemen', 'Posisi', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	if(!$id){
		        	redirect('dashboard/departemen');
	        	}
	        
	        	//panggil form edit
	        	$this->edit($id);
	        }
	        else{
	        	$dataPosisi = ['nama_departemen'		=> $this->input->post('nama_departemen'),
	        				   'status'		=> $this->input->post('status'),
				               'diganti'    		=> saatIni()
				              ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Departemen_model->update($id, $dataPosisi);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Data posisi berhasil di update'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/departemen');
	        }   
        }

		//data json untuk datatables
		public function data(){
			$rows = $this->Departemen_model->semua()->result();

			$dataTable['data'] = $rows;
			echo json_encode($dataTable);
		}

	}