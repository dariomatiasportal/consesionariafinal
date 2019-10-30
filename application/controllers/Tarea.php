<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarea extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function _example_output1($output1 = null)
    {
        $this->load->view('TareaView',(array)$output1);
    }
    public function _example_output2($output2 = null)
    {
        $this->load->view('TareaTerminadaView',(array)$output2);
    }

    public function offices()
    {
        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function index()
    {
        $this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }

    public function tarealist()
    {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
      
            //$crud->display_as('id','Mecanico')
            $where = "estado='1' OR estado='2'";

            $crud->where ($where);

            $crud->set_table('gantt_tasks');
                        
            //$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');

            $crud->display_as('text','Descripcion')
                 ->display_as('orden','Numero de Orden')
                 //->display_as('asesor','Asesor de Servicio')
                 ->display_as('start_date','Comienzo')
                 ->display_as('progress','Descripcion')
                 ->display_as('duration','Duracion Horas')
                 ->display_as('text','Descripcion');
            
            $crud->set_subject('Tarea');            

            $crud->field_type('estado','dropdown',
            array('1' => 'Detenido','2' => 'Ejecutando','3' => 'Terminado'));

            $crud->columns('orden','cliente','vehiculo','patente','mecanico','asesor','text','duration','estado');
            
            $crud->set_relation('mecanico','members','{id}');
            //$crud->set_relation('asesor','asesores','{apellido} {nombre}');

            $crud->required_fields('orden');
            $crud->required_fields('cliente');
            //$crud->required_fields('patente');
            $crud->required_fields('vehiculo');
            $crud->required_fields('text');

            $crud->add_fields('mecanico','orden','asesor','cliente','patente','vehiculo','text','start_date','duration','estado');
            $crud->edit_fields(array('mecanico','orden','asesor','cliente','patente','vehiculo','text','start_date','duration','estado'));

            $output1 = $crud->render();

            $this->_example_output1($output1);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

        public function tareaterminada()
    {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
      
            //$crud->display_as('id','Mecanico')
            $where = "estado='3'";

            $crud->where ($where);

            $crud->set_table('gantt_tasks');
                        
            //$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');

            $crud->display_as('text','Descripcion')
                 ->display_as('orden','Numero de Orden')
                 //->display_as('asesor','Asesor de Servicio')
                 ->display_as('start_date','Comienzo')
                 ->display_as('progress','Descripcion')
                 ->display_as('duration','Duracion Horas')
                 ->display_as('text','Descripcion');
            
            $crud->set_subject('Tarea');            

            $crud->field_type('estado','dropdown',
            array('1' => 'Detenido','2' => 'Ejecutando','3' => 'Terminado'));

            $crud->columns('orden','cliente','vehiculo','patente','mecanico','asesor','text','duration','estado');
            
            $crud->set_relation('mecanico','members','{id}');
            //$crud->set_relation('asesor','asesores','{apellido} {nombre}');

            $crud->required_fields('orden');
            $crud->required_fields('cliente');
            //$crud->required_fields('patente');
            $crud->required_fields('vehiculo');
            $crud->required_fields('text');

            $crud->add_fields('mecanico','orden','asesor','cliente','patente','vehiculo','text','start_date','duration','estado');
            $crud->edit_fields(array('mecanico','orden','asesor','cliente','patente','vehiculo','text','start_date','duration','estado'));

            $output2 = $crud->render();

            $this->_example_output2($output2);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    function empleados_management()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_theme('flexigrid');
        $crud->set_table('members');
        $crud->set_subject('Mecanicos');
        $crud->required_fields('id');
        $crud->columns('id','nombre');

        $crud->add_fields('id','nombre');
        $crud->edit_fields(array('id','nombre'));
 
        $output = $crud->render();
 
        $this->_example_output($output);
    }

    public function customers_management()
    {
            $crud = new grocery_CRUD();

            $crud->set_table('customers');
            $crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
            $crud->display_as('salesRepEmployeeNumber','from Employeer')
                 ->display_as('customerName','Name')
                 ->display_as('contactLastName','Last Name');
            $crud->set_subject('Customer');
            $crud->set_relation('salesRepEmployeeNumber','employees','lastName');

            $output = $crud->render();

            $this->_example_output($output);
    }

    public function orders_management()
    {
            $crud = new grocery_CRUD();

            $crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
            $crud->display_as('customerNumber','Customer');
            $crud->set_table('orders');
            $crud->set_subject('Order');
            $crud->unset_add();
            $crud->unset_delete();

            $output = $crud->render();

            $this->_example_output($output);
    }

    public function products_management()
    {
            $crud = new grocery_CRUD();

            $crud->set_table('products');
            $crud->set_subject('Product');
            $crud->unset_columns('productDescription');
            $crud->callback_column('buyPrice',array($this,'valueToEuro'));

            $output = $crud->render();

            $this->_example_output($output);
    }

    public function valueToEuro($value, $row)
    {
        return $value.' &euro;';
    }

    public function film_management()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('film');
        $crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
        $crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
        $crud->unset_columns('special_features','description','actors');

        $crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function film_management_twitter_bootstrap()
    {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('twitter-bootstrap');
            $crud->set_table('film');
            $crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
            $crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
            $crud->unset_columns('special_features','description','actors');

            $crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

            $output = $crud->render();
            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    function multigrids()
    {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms',true);
        $this->config->set_item('grocery_crud_default_per_page',10);

        $output1 = $this->offices_management2();

        $output2 = $this->employees_management2();

        $output3 = $this->customers_management2();

        $js_files = $output1->js_files + $output2->js_files + $output3->js_files;
        $css_files = $output1->css_files + $output2->css_files + $output3->css_files;
        $output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

        $this->_example_output((object)array(
                'js_files' => $js_files,
                'css_files' => $css_files,
                'output'    => $output
        ));
    }

    public function offices_management2()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('offices');
        $crud->set_subject('Office');

        $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

        $output = $crud->render();

        if($crud->getState() != 'list') {
            $this->_example_output($output);
        } else {
            return $output;
        }
    }

    public function employees_management2()
    {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('employees');
        $crud->set_relation('officeCode','offices','city');
        $crud->display_as('officeCode','Office City');
        $crud->set_subject('Employee');

        $crud->required_fields('lastName');

        $crud->set_field_upload('file_url','assets/uploads/files');

        $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

        $output = $crud->render();

        if($crud->getState() != 'list') {
            $this->_example_output($output);
        } else {
            return $output;
        }
    }

    public function customers_management2()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('customers');
        $crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
        $crud->display_as('salesRepEmployeeNumber','from Employeer')
             ->display_as('customerName','Name')
             ->display_as('contactLastName','Last Name');
        $crud->set_subject('Customer');
        $crud->set_relation('salesRepEmployeeNumber','employees','lastName');

        $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

        $output = $crud->render();

        if($crud->getState() != 'list') {
            $this->_example_output($output);
        } else {
            return $output;
        }
    }

}
