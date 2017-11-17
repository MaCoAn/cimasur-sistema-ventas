<?

class UsuariosModel extends CI_Model
{

    public function __construct(){
        $this->load->database();
    }

    public function getTipoUsuario()
    {
        $query = $this->db->get("TipoUsuario");
        return $query->result();
    }

    public function getEstatusUsuario()
    {
        $query = $this->db->get("StatusUsuario");
        return $query->result();        
    }

    public function getUsuarios($id = NULL){
        $sql = "SELECT u.id, u.nickname, u.Nombre, u.Apellidos, u.email, t.Nombre as Tipo, s.Nombre as Estatus
                  FROM Usuario u
                  INNER JOIN TipoUsuario t ON u.idTipoUsuario = t.id
                  INNER JOIN StatusUsuario s ON u.StatusId = s.id";
         
         if ($id == NULL)
         {
             $query = $this->db->query($sql);
             return $query->result();
         } else {
             $query = $this->db->query($sql . " WHERE u.id = ?", array($id));
             return $query->row();
         }

    }

    public function insertarUsuario()
    {    
        $data = array(
            'idTipoUsuario' => $this->input->post('tipo'),
            'nickname' => $this->input->post('nickname'),
            'password' => md5($this->input->post('password')),
            'Nombre' => $this->input->post('nombre'),
            'Apellidos' => $this->input->post('apellidos'),
            'email' => $this->input->post('email'),
            'StatusId' => $this->input->post('estatus')
        );

        return $this->db->insert('Usuario', $data);
    }

    public function actualizarUsuario($id) 
    {
        $data = "";

        if ($this->input->post('password') != ""){
            $data = array(
                'idTipoUsuario' => $this->input->post('tipo'),
                'nickname' => $this->input->post('nickname'),
                'password' => md5($this->input->post('password')),
                'Nombre' => $this->input->post('nombre'),
                'Apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('email'),
                'StatusId' => $this->input->post('estatus')
            );
        } else{
            $data = array(
                'idTipoUsuario' => $this->input->post('tipo'),
                'nickname' => $this->input->post('nickname'),
                'Nombre' => $this->input->post('nombre'),
                'Apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('email'),
                'StatusId' => $this->input->post('estatus')
            );
        }

        $this->db->where('id', $id);        
        $this->db->update('Usuario', $data);
    }
}

?>