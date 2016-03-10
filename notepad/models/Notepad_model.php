<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notepad_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function obtenerListaNotas()
    {
        $this->db->select(['id', 'titulo']);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('notas')->result();
    }

    public function obtenerNota($id)
    {
        return $this->db->get_where('notas', ['id' => $id])->result();
    }

    public function agregarNota($contenido)
    {
        $query = $this->db->insert('notas', $contenido);
        if ($query)
        {
            return $this->db->insert_id();
        }
        else
        {
            return fasle;
        }
    }

    public function editarNota($id, $contenido)
    {
        $query = $this->db->update('notas', $contenido, ['id' => $id]);
        if ($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function borrarNota($id)
    {
        $query = $this->db->delete('notas', ['id' => $id] );
        if ($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}