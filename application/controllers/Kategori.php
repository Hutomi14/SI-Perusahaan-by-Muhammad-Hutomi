<?php

	class Kategori extends CI_Controller {

		private $template = 'templates/dashboard/template';

		public function __construct(){
			parent::__construct();
			apakahLoginRedirect();

			$this->load->model('Karyawan_model');
			$this->load->model('Kategori_model');
		}

        public function index($page = 'pages/kategori/list')
        {
			$data['title'] = 'Kategori';
			$data['titleDashboard'] = 'Kategori';
			$data['kontenDinamis'] = $page;
			
			$this->load->view($this->template, $data);        
        }

        public function add($page = 'pages/kategori/form'){
			$data['title'] = 'Kategori | Tambah';
			$data['titleDashboard'] = 'Kategori';
			$data['kontenDinamis'] = $page;
			$data['tombol'] = 'Create';
			$data['action'] = base_url('dashboard/administrasi/kategori/create');

			$data['status'] = array_combine($this->config->item('status'),
											$this->config->item('status'));

			$this->load->view($this->template, $data);    
        }

        public function create(){
	    	$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	//panggil form tambah
	        	$this->add();
	        }
	        else{
	        	$data = ['tipe'=> $this->input->post('tipe'),
	        				   'nama_kategori'=> $this->input->post('nama_kategori'),
	        				   'keterangan'=> $this->input->post('keterangan'),
	        				   'status'		=> $this->input->post('status'),
				               'dibuat'    => saatIni(),
				               'diganti'    => saatIni()
				              ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Kategori_model->create($data);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Data kategori berhasil di tambahkan'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/administrasi/kategori');
	        }   
        }

        public function edit($id = 0, $page = 'pages/kategori/form'){
			$data['title'] = 'Kategori | Edit';
			$data['titleDashboard'] = 'Kategori';
			$data['kontenDinamis'] = $page;
			$data['row'] = $this->Kategori_model->berdasarkanId($id)->row();
			$data['tombol'] = 'Update';
			$data['action'] = base_url('dashboard/administrasi/kategori/update/'.$id);

			$data['status'] = array_combine($this->config->item('status'),
											$this->config->item('status'));

			$this->load->view($this->template, $data);    
        }

        public function update($id){
	    	$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

	    	if ($this->form_validation->run() == FALSE)
	        {  	
	        	if(!$id){
		        	redirect('dashboard/administrasi/kategori');
	        	}
	        
	        	//panggil form edit
	        	$this->edit($id);
	        }
	        else{
	        	$data = ['nama_kategori'	=> $this->input->post('nama_kategori'),
	        				   'tipe'			=> $this->input->post('tipe'),
	        				   'keterangan'		=> $this->input->post('keterangan'),
	        				   'status'			=> $this->input->post('status'),
				               'diganti'    	=> saatIni()
				              ];

	        	//kalau form diisi dengan benar maka simpan data ke table user
				$this->Kategori_model->update($id, $data);

				// //untuk notifikasi
				$dataPesan = ['alert' => 'alert-success',
	        				  'pesan' => 'Data posisi berhasil di update'];

	    		$this->session->set_flashdata($dataPesan);

				// //pindahkan ke halaman login
				redirect('dashboard/administrasi/kategori');
	        }   
        }

		//data json untuk datatables
		public function data(){
			$rows = $this->Kategori_model->semua()->result();

			$dataTable['data'] = $rows;
			echo json_encode($dataTable);
		}

	}