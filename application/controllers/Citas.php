<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Citas extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('CitasModel');
            $this->load->helper('url_helper');
            $this->load->helper('html');
    }
     
    /**
     * Muestra la informacion 
     * en el listado de Citas
     */
    public function index() 
    {
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
        
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } 

        $citasModel = new CitasModel;
        $data['Citas'] = $citasModel->getCitas();

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Citas/list', $data);
        $this->load->view('Plantilla/footer_app');
    }

    public function update($id = NULL) 
    {
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
        
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } 
        
        $citasModel = new CitasModel;
        $data['Clientes'] = $citasModel->getClientesPorVendedor($this->session->user_data('id'));
        $data['Inmuebles'] = $citasModel->getInmuebles();
        $data['TipoInteresados'] = $citasModel->getTipoInteresadoEnum();


        if ($id == NULL) {
            // Settear los valores de default
            $data['IdCita'] = 0;
            $data['fecha'] = date('Y-m-d\TH:i:s');
            $data['noCita'] = 1;
            $data['comentarios'] = "";

        } else {
            
            // Settear los valores de la BD
            $cita = $citasModel->getCitas($id);

            $data['IdCita'] = $id;
            $data['fecha'] = date('Y-m-d\TH:i:s', strtotime($cita->Fecha));
            $data['noCita'] = $cita->NoCita;
            $data['comentarios'] = $cita->Comentarios;
        }

        // Cargar las vistas
        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Citas/update', $data);
        $this->load->view('Plantilla/footer_app');
    }

    public function postData($id)
    {
        if ($id == 0)
        {
            $this->insertarNuevaCita();
        } 
        else 
        {
            $this->actualizarCita($id);
        }
    }

    public function insertarNuevaCita() 
    {
        $citasModel = new CitasModel;
        $citasModel->insertarCita();
        redirect(base_url('index.php/citas/index'));
    }

    public function actualizarCita($id) 
    {
        $citasModel = new CitasModel;
        $citasModel->actualizarCita($id);
        redirect(base_url('index.php/citas/index'));
    }


    public function delete($id)
    {
       $this->load->helper('url');
       $this->load->helper('html');
       
       $this->db->where('id', $id);
       $this->db->delete('Cita');
       redirect(base_url('/index.php/citas/'));
   }
}