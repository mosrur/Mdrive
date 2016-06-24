<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 *
	 */


	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Index page
	 */
	public function index()
	{
		$data['title'] = 'Home | Mdrive File Sharing';
		$this->load->view('home', $data);
	}
}
