<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Inmuebles extends CI_Controller {
     

    /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('InmueblesModel');         
   }


    public function index() 
    {

        $inmuebles=new InmueblesModel;
        $tipoInmuebles['data']=$inmuebles->getTipoInmueble();

        $this->load->helper('url');
        $this->load->helper('html');


        $this->load->view('header_app');
        $this->load->view('topbar_app');
        $this->load->view('sidebar_app');
        $this->load->view('inmuebles', $tipoInmuebles);
        $this->load->view('footer_app');
    }
}