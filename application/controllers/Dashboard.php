<?php

	class Dashboard extends CI_Controller {

		private $template = 'templates/dashboard/template';

		public function __construct(){
			parent::__construct();

			apakahLoginRedirect();
		}

        public function index($page = 'pages/home/list')
        {
			$data['title'] = 'Dashboard';
			$data['titleDashboard'] = 'Dashboard';
			$data['kontenDinamis'] = $page;
			
			$this->load->view($this->template, $data);        
        }

	}