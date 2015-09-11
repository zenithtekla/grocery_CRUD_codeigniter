<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
        die();
    }
    public function staff()
    {
        $crud = new grocery_CRUD();
        // $this->grocery_crud->set_table('employees');
        $crud->set_subject('Employee');
        $crud->set_table('employees');
        $crud->columns('lastName','firstName','jobTitle', 'email', 'file_url');
        $crud->fields('lastName','firstName','jobTitle','email', 'file_url');
        
        $crud->display_as('lastName','Last Name');
        $crud->display_as('firstName','First Name');
        $crud->display_as('jobTitle','Job Title');
        
        $crud->required_fields('lastName');
        $crud->unset_texteditor('jobTitle');
        // $crud->new_multi_upload('file_url');
      //  $crud->set_field_upload('file_url','assets/uploads/files');
        
        // * $output = $this->grocery_crud->render();
        $output = $crud->render();
         
        $this->_example_output($output); 
    }
        function _example_output($output = null)
 
    {
        $this->load->view('our_template.php',$output);    
    }
    
    public function sample_table()
    {
        $this->grocery_crud->set_table('sample_table');
        $output = $this->grocery_crud->render();
         
        $this->_custom_output($output); 
    }
    function _custom_output($output = null)
 
    {
        $this->load->view('custom_template.php',$output);    
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */