<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }
    public function index()
    {
        $this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }
    public function employees()
    {
        $crud = new grocery_CRUD();
        // $this->grocery_crud->set_table('employees');
        $crud->set_theme('datatables');
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
        $this->load->view('example.php',$output);
    }
    public function offices()
    {
        $output = $this->grocery_crud->render();
        $this->_example_output($output);
    }
    public function offices_management()
    {
        try{
            $crud = new grocery_CRUD();
            $crud->set_theme('twitter-bootstrap');
            $crud->set_table('offices');
            $crud->set_subject('Office');
            $crud->required_fields('city');
            $crud->columns('city','country','phone','addressLine1','postalCode');
            $output = $crud->render();
            $this->_example_output($output);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
    public function employees_management()
    {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('employees');
            $crud->set_relation('officeCode','offices','city');
            $crud->display_as('officeCode','Office City');
            $crud->set_subject('Employee');
            $crud->required_fields('lastName');
            $crud->set_field_upload('file_url','assets/uploads/files');
            $output = $crud->render();
            $this->_example_output($output);
    }

    /*function editbutton(){
        return site_url('Main/sample_table/edit'. $row->$primary_key);
    }*/
    
    public function sample_table()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('sample_table');
        $crud->add_fields('thread', 'subject', 'content');
        $crud->columns('thread', 'subject', 'content', 'date_entered', 'time_stampp');
        $crud->callback_column('time_stampp',array($this,'date2UNIX'));
        $crud->edit_fields('thread', 'subject', 'content');
        $crud->required_fields('thread', 'subject', 'content');
        $crud->unset_texteditor('date_entered');
        $crud->unset_texteditor('time_stamp');
        $output = $crud->render();
        $this->_custom_output($output);
    }
    function date2UNIX($value, $row)
    {
        return strtotime($row->date_entered);
        // return strtotime(str_replace('/', '-', $row->date_entered));
    }
    function _custom_output($output = null)
    {
        $this->load->view('custom_template.php',$output);
    }
}
/* End of file main.php */
/* Location: ./application/controllers/main.php */
/* $this->load->css('assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css');
        $this->load->js('assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js');
        <script>
            hljs.initHighlightingOnLoad();
        </script> */