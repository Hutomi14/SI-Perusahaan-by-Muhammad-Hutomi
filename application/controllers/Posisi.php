<?php

	class Posisi extends CI_Controller {

		private $template = 'templates/dashboard/template';

		public function __construct(){
			parent::__construct();
			apakahLoginRedirect();

			$this->load->model('Karyawan_model');
			$this->load->model('Departemen_model');
			$this->load->model('Posisi_model');
		}

        public function index($page = 'pages/posisi/list')
        {
			$data['title'] = 'Posisi';
			$data['titleDashboard'] = 'Posisi';
			$data['kontenDinamis'] = $page;
			
			$this->load->view($this->template, $data);        
        }

        public function add($page = 'pages/posisi/form'){
			$data['title'] = 'Posisi | Tambah';
			$data['titleDashboard'] = 'Posisi';
			$data['kontenDinamis'] = $page;
			$data['tombol'] = 'Create';
			$data['action'] = base_url('posisi/create');

			$data['status'] = array_combine($this->config->item('status'),
											$this->config->item('status'));

			$this->load->view($this->template, $data);    
        }

        public function create(){
	    	$this->form_validation->set_rules('nama_posisi', 'Posisi', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	//panggil form tambah
	        	$this->add();
	        }
	        else{
	        	$dataPosisi = ['nama_posisi'=> $this->input->post('nama_posisi'),
	        				   'status'		=> $this->input->post('status'),
				               'dibuat'    => saatIni(),
				               'diganti'    => saatIni()
				              ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Posisi_model->create($dataPosisi);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Data posisi berhasil di tambahkan'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/posisi');
	        }   
        }

        public function edit($id = 0, $page = 'pages/posisi/form'){
			$data['title'] = 'Posisi | Edit';
			$data['titleDashboard'] = 'Posisi';
			$data['kontenDinamis'] = $page;
			$data['row'] = $this->Posisi_model->melaluiId($id)->row();
			$data['tombol'] = 'Update';
			$data['action'] = base_url('posisi/update/'.$id);

			$data['status'] = array_combine($this->config->item('status'),
											$this->config->item('status'));

			$this->load->view($this->template, $data);    
        }

        public function update($id){
	    	$this->form_validation->set_rules('nama_posisi', 'Posisi', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	if(!$id){
		        	redirect('dashboard/posisi');
	        	}
	        
	        	//panggil form edit
	        	$this->edit($id);
	        }
	        else{
	        	$dataPosisi = ['nama_posisi'		=> $this->input->post('nama_posisi'),
	        				   'status'		=> $this->input->post('status'),
				               'diganti'    		=> saatIni()
				              ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Posisi_model->update($id, $dataPosisi);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Data posisi berhasil di update'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/posisi');
	        }   
        }

		//data json untuk datatables
		public function data(){
			$rows = $this->Posisi_model->semua()->result();

			$dataTable['data'] = $rows;
			echo json_encode($dataTable);
		}

	}