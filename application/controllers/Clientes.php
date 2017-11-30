<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Clientes extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('ClientesModel');
            $this->load->helper('url_helper');
            $this->load->helper('html');
            $this->load->helper('form');
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

        $clientesModel = new ClientesModel;
        $data['clientes'] = $clientesModel->getListaClientes();

        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Clientes/list', $data);
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
        
        $ClientesModel = new ClientesModel;
        $data['Estados'] = $ClientesModel->getEstados();
        $data['ComoSeEntero'] = $ClientesModel->getComoSeEntero();
        $data['StatusCliente'] = $ClientesModel->getStatus();
        $data['Clientes'] = $ClientesModel->getClientes();


        if ($id == NULL) {

            $data['operacion'] = 'Agregar Cliente';

            // Settear los valores de default
            $data['idCliente'] = 0;
            $data['nombres'] = "";
            $data['apellidos'] = "";
            $data['direccion'] = "";
            $data['colonia'] = "";
            $data['email'] = "";
            $data['telCel'] = '';
            $data['telCasa'] = '';
            $data['telOfi'] = '';
            $data['telRef'] = '';
            $data['hizoRecorrido'] = 0;
            $data['idComoSeEntero'] = 0;
            $data['idClienteRef'] = 0;

            $data['nombresRef'] = "";
            $data['apellidosRef'] = "";
            $data['emailRef'] = "";

        } else {
            $data['operacion'] = 'Actualizar Cliente';

            // Obtener el cliente a actualizar
            $cliente = $ClientesModel->getCliente($id);

            // DEfaults
            $data['telCasa'] = "";
            $data['telOfi'] = "";
            $data['telCel'] = "";
            $data['idClienteRef'] = '0';
            $data['nombresRef'] = "";
            $data['apellidosRef'] = "";
            $data['emailRef'] = "";
            $data['telRef'] = "";

            $data['idCliente'] = $cliente->Id;
            $data['nombres'] = $cliente->Nombres;
            $data['apellidos'] = $cliente->Apellidos;
            $data['direccion'] = $cliente->Direccion;
            $data['colonia'] = $cliente->Colonia;
            $data['email'] = $cliente->Email;
            $data['hizoRecorrido'] = $cliente->HizoRecorrido;

            // Obtener telefono de casa
            $result = $ClientesModel->getTelefono($id, 'Casa');
            if ($result != NULL) {
                $data['telCasa'] = $result;
            }

            // Obtener telefono de oficina
            $result = $ClientesModel->getTelefono($id, 'Oficina');
            if ($result != NULL) {
                $data['telOfi'] = $result;
            }

            // Obtener telefono de celiular
            $result = $ClientesModel->getTelefono($id, 'Movil');
            if ($result != NULL) {
                $data['telCel'] = $result;
            }

            $data['idMunicipio'] = $cliente->idMunicipio;
            $data['idEstado'] = $ClientesModel->getEstadoId($cliente->idMunicipio);
            $data['idComoSeEntero'] = $cliente->idComoSeEntero;

            if ($cliente->idComoSeEntero == '13') {
                // REferenciador Externo
                $referenciador = $ClientesModel->getReferenciador($cliente->Id);

                $data['nombresRef'] = $referenciador->Nombres;
                $data['apellidosRef'] = $referenciador->Apellidos;
                $data['emailRef'] = $referenciador->Email;
                $data['telRef'] = $referenciador->Telefono;
    
            } else if ($cliente->idComoSeEntero == '12') {
                // REferenciado por Cliente
                $clienteRef = $ClientesModel->getClienteReferenciador($cliente->Id);
                $data['idClienteRef'] = $clienteRef;
            }
        }

        // Cargar las vistas
        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Clientes/update', $data);
        $this->load->view('Clientes/javascript');
        $this->load->view('Plantilla/footer_app');
    }

    /**
     * Regresa los municipios asociados con el estado
     */
    public function municipiosPorEstado($idEdo) 
    {
        header('Content-Type: application/json');
        $ClientesModel = new ClientesModel;
        echo json_encode($ClientesModel->getMunicipios($idEdo));
    }

    /**
     * Inserta un nuevo registro de cliente
     */
    public function insertarNuevoCliente() 
    {
        if ($this->validateData()) {
            $ClientesModel = new ClientesModel;
            $ClientesModel->insertarCliente($this->session->userdata('id'));
            redirect(base_url('/Clientes/index'));
        } else {
            //echo validation_errors();;
        }
    }

    public function validateData()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'nombres', 'Nombres', 'trim|required');
        $this->form_validation->set_rules(
            'apellidos', 'Apellidos', 'trim|required');
        $this->form_validation->set_rules(
            'direccion', 'Direccion', 'trim|required');
        $this->form_validation->set_rules(
            'colonia', 'Colonia', 'trim|required');
        $this->form_validation->set_rules(
            'email', 'Email', 'trim|valid_email');
        $this->form_validation->set_rules(
            'telCel', 'Telefono Celular', 'trim|required');
        $this->form_validation->set_rules(
            'idComoSeEntero', 'ComoSeEntero', 'callback_dropdown_check');            

        if ($this->input->post('idComoSeEntero') == '13') {
            
            $this->form_validation->set_rules(
                'nombresRef', 'Nombres Ref', 'trim|required');
            $this->form_validation->set_rules(
                'apellidosRef', 'Apellidos Ref', 'trim|required');
            $this->form_validation->set_rules(
                'emailRef', 'Email Ref', 'trim|valid_email');

        } else if ($this->input->post('idComoSeEntero') == '12') {

            $this->form_validation->set_rules(
                'clienteReferenciador', 'Cliente referenciador', 'callback_dropdown_check');
        }
            
        return $this->form_validation->run();
    }

    public function dropdown_check($str) {
        // Cadena Vacia si no se ha hecho una seleccion
        // Tiene que comparar contra ''!!!
        if ($str == '') {
            $this->form_validation->set_message('dropdown_check', 
                'The {field} field was not selected a value.');
            return FALSE;
        }
        return TRUE;
    }

    public function postData($id)
    {
        if ($id == 0)
        {
            $this->insertarNuevoCliente();
        } 
        else 
        {
            $this->actualizarCliente($id);
        }
    }

    public function actualizarCliente($id) 
    {
        $ClientesModel = new ClientesModel;
        $ClientesModel->actualizarCliente($id);
        redirect(base_url('/clientes/index'));
    }

    public function eliminarCliemte($id) {
        $ClientesModel = new ClientesModel;
        $ClientesModel->eliminarCliemte($id);
        redirect(base_url('/clientes/index'));
    }

    public function reactivarCliente($id) {
        $ClientesModel = new ClientesModel;
        $ClientesModel->reactivarCliente($id);
        redirect(base_url('/clientes/index'));
    }
    
    public function filtrarClientesPorFechas()
    {
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
        
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } 
        if($this->input->post['anioInicial']){
            redirect('Clientes/filtrarClientesPorFechas');
        }

        $clientesModel = new ClientesModel;
        $data['clientes'] = $clientesModel->filtrarClientesPorFechas();
        $data['mesInicial'] = $this->input->post('mesInicial');
        $data['mesFinal'] = $this->input->post('mesFinal');
        $data['anioInicial'] = $this->input->post('anioInicial');
        $data['anioFinal'] = $this->input->post('anioFinal');
        
        $this->load->view('Plantilla/header_app');
        $this->load->view('Plantilla/topbar_app');
        $this->load->view('Plantilla/sidebar_app');
        $this->load->view('Clientes/list', $data);
        $this->load->view('Plantilla/footer_app');
    }
}