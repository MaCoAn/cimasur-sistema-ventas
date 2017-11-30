<?php

class CitasModel extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function getTipoInteresadoEnum()
    {
        $query = $this->db->get("TipoInteresado");
        return $query->result();        
    }

    public function getClientesPorVendedor($idVendedor) 
    {
        if ($idVendedor != NULL)
        {
            $query = $this->db->get_where("Cliente", array("idVendedor" => $idVendedor));
            return $query->result();
        }
        return NULL;
    }

    public function getInmuebles(){
        $query = $this->db->query(
            "SELECT i.id, i.Nombre, i.Precio, d.Nombre as Disponibilidad, t.Nombre as Tipo
             FROM Inmueble i
             INNER JOIN DispInmueble d ON i.idDisponibilidad = d.id
             INNER JOIN TipoInmueble t ON i.idTipo = t.id");
        return $query->result();
    }

    public function getCitas($id = NULL)
    {
        $sql = "SELECT c.id, cl.Nombres, cl.Apellidos, c.NoCita, DATE_FORMAT(c.Fecha, '%d-%m-%Y') as Fecha,
                        c.Comentarios
                    FROM Cita c
                    INNER JOIN Cliente cl ON c.IdCliente = cl.Id";

        if ($id == NULL)
        {
            // Si no hay Id, entonces regresa todas las citas
            $query = $this->db->query($sql . " ORDER BY cl.Nombres, cl.Apellidos, c.NoCita ");
            return $query->result();
        } else {
            // Regresa solo la cita asociada a este Id
            $query = $this->db->query($sql . " WHERE cl.Id = ? 
            ORDER BY cl.Nombres, cl.Apellidos, c.NoCita", array($id));

            return $query->result();
        }
    }

    public function insertarCita()
    {    
        $citaData = array(
            'idCliente' => $this->input->post('idCliente'),
            'noCita' => $this->input->post('noCita'),
            'fecha' => $this->input->post('fecha'),
            'comentarios' => $this->input->post('comentarios')
        );
        // Insertar los datos principales de la tabla Cita
        $this->db->insert('Cita', $citaData);
        // Obtener Id del ultimo insert
        $insert_id = $this->db->insert_id();

        // Insertar la relacion de cita - Inmueble
        $inmuebleData = array(
            'idCita' => $insert_id,
            'idInmueble' => $this->input->post('idInmueble'),
            'tipoInteresadoId' => $this->input->post('tipoInteresadoId'),
        );
        // Insertar datos de tabla secundaria 
        $this->db->insert('InmuebleCliente', $inmuebleData);
    }

    public function actualizarCita($id)
    {
        // Actualizar la cita
        $citaData = array(
            'idCliente' => $this->input->post('idCliente'),
            'noCita' => $this->input->post('noCita'),
            'fecha' => $this->input->post('fecha'),
            'comentarios' => $this->input->post('comentarios')
        );
        $this->db->where('id', $id);
        $this->db->update('Cita', $citaData);

        // Actualizar su inmueble
        $inmuebleData = array(
            'idInmueble' => $this->input->post('idInmueble'),
            'tipoInteresadoId' => $this->input->post('tipoInteresadoId'),
        );
        $this->db->where('idCita', $id);
        $this->db->update('InmuebleCliente', $inmuebleData);
    }

    public function eliminarCita($id)
    {
        // Eliminar primero los records secundarios
        $this->db->where('idCita', $id);
        $this->db->delete('InmuebleCliente');

        // Elimimar ahora los records principales
        $this->db->where('id', $id);
        $this->db->delete('Cita');
    }

    public function obtenerSigNoCitaCliente($idCliente) 
    {
        $sql = "SELECT (COUNT(*) + 1) as nextNo
                FROM Cita c
                WHERE c.idCliente = ?";
        $query = $this->db->query($sql, array($idCliente));
        return $query->row();
    }
}