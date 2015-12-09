<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class home extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('welcome_message.php',$output);
	}
	
	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		echo "my webApp";
	}
}