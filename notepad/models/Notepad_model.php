<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notepad_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function obtenerListaNotas(){

        $this->db->select(['id','titulo']);

        return $this->db->get('notas')->result();
    }

    public function obtenerNota($id){

        return $this->db->get_where('notas',['id' => $id])->result();
    }

}