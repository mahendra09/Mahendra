<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class logout extends CI_Controller {	public function __construct(){		parent::__construct();     	}		public function index(){   		$this->session->unset_userdata('admin_id');		$this->session->unset_userdata('admin_email');		$this->session->unset_userdata('admin_name');		redirect(base_url().'specialadmin/login');	}}