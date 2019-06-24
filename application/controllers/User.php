<?php

class User extends CI_Controller {

	public function __construct(){
		/* kalau mau bikin konstruktor di Codeigniter maka harus taro script
		   dibawah ini supaya tidak menpimpa controller CI */
		parent::__construct();

		/* load helper / library hanya untuk class User
		   kalau helper / library sering dipakai di berbagai class, langsung load di config/autoload.php */
		// $this->load->helper('form');
		$this->load->library(['password']);

		//model user
		$this->load->model('User_model');
	}

    public function register($page = 'register'){

		if($this->session->userdata('logged_in')){
			redirect('dashboard');
		}

    	$data['title'] = 'Register';

		$this->load->view('templates/open', $data);  
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/close', $data);  
    }

    public function prosesRegister(){

		if($this->session->userdata('logged_in')){
			redirect('dashboard');
		}

    	$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
    	$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[karyawan.email]');
    	$this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required');
    	$this->form_validation->set_rules('alamat', 'alamat', 'required');
    	$this->form_validation->set_rules('nomor_telepon', 'nomor_telepon', 'numeric');
    	$this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required|numeric');
    	$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
    	$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
    	$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');

    	if ($this->form_validation->run() == FALSE)
        {
        	//panggil method register
        	$this->register();  
        }
        else{
        	$dataRegister = ['nama_depan'		=> $this->input->post('nama_depan'),
			                 'nama_belakang'    => $this->input->post('nama_belakang'),
			                 'email'            => $this->input->post('email'),
			                 'dob'            	=> $this->input->post('dob'),
			                 'nomor_telepon'    => $this->input->post('nomor_telepon'),
			                 'nomor_hp'    		=> $this->input->post('nomor_hp'),
			                 'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
			                 'alamat'   		 => $this->input->post('alamat'),
			                 'password'    		=> $this->password->hash($this->input->post('password')),
			                 'dibuat'    		=> saatIni(),
			                 'diganti'    		=> saatIni(),
			                 'id_departemen'    => 1,
			                 'id_posisi'    	=> 1,
			                 'status'    		=> 'interview'
			             	];

        	//kalau form diisi dengan benar maka simpan data ke table user
			$this->User_model->create($dataRegister);

			//untuk notifikasi
			$dataPesan = ['alert' => 'alert-success',
        					  'pesan' => 'Akun anda berhasil dibuat'];

    		$this->session->set_flashdata($dataPesan);

			//pindahkan ke halaman login
			redirect('login');
        }
    }

    public function login($page = 'login'){

		if($this->session->userdata('logged_in')){
			redirect('dashboard');
		}

    	$data['title'] = 'Login';

    	$this->load->view('templates/open', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/close', $data);
    }

    public function prosesLogin(){

		if($this->session->userdata('logged_in')){
			redirect('dashboard');
		}

    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');

    	if ($this->form_validation->run() == FALSE)
        {
    		//tampilkan halaman login
        	$this->login();  
        }else{

        	$email = $this->input->post('email');
        	$password = $this->input->post('password');

        	if($user = $this->User_model->login($email, $password)){
				$dataLogin = ['user_id'			=>  $user->id,
			        		  'nama_depan'		=> $user->nama_depan,
			        		  'nama_belakang'	=> $user->nama_belakang,
			        		  'logged_in' => TRUE
							];

				$this->session->set_userdata($dataLogin);

				//pindahkan ke halaman home
				redirect('dashboard');
        	}else{
        		$dataPesan = ['alert' => 'alert-danger',
        					  'pesan' => 'Email atau password yang anda masukan tidak cocok'];

        		$this->session->set_flashdata($dataPesan);

        		//tampilkan halaman login
	        	$this->login();
        	}

        }
    }

    public function logout(){
    	$dataLogin = ['user_id', 'nama_depan', 'nama_belakang', 'logged_in'];
    	
    	//delete session login
    	$this->session->unset_userdata($dataLogin);

    	redirect('login');
    }


}