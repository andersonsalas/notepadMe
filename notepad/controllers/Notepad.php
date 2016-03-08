<?php
/*
 * notepadMe! (versión 0.1)
 *
 * Desarrollado por Anderson Salas (contacto@andersonsalas.com.ve)
 * Repositorio en GitHub: https://github.com/andersonsalas/notepadMe
 *
 * -------------------------------------------------------------------------------------
 *
 *   notepadMe!
 *   Copyright (C) 2016 Anderson Salas
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License along
 *   with this program; if not, write to the Free Software Foundation, Inc.,
 *   51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notepad extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $helpers = [
            'url',
            'general',
        ];
        $libraries = [
            'encryption',
            'session',
        ];

        $this->load->helper($helpers);
        $this->load->library($libraries);

        $this->load->database();
        $this->load->model('Notepad_model');

    }

    public function index(){

        $this->load->view('general/header');
        $this->load->view('notepad/home');
        $this->load->view('general/footer');

    }

    public function lista(){

        if($this->input->is_ajax_request()){

            $notas = $this->Notepad_model->obtenerListaNotas();
            $output = '';

            foreach($notas as $nota){
                $output .= '<li><a href="#" data-id="'.$nota->id.'">'.$nota->titulo.'</a></li>';
            }

            echo $output;

        } else {
            redirect(base_url());
        }

    }

    public function editor($id_nota = null){

        if($this->input->is_ajax_request()){

            if(is_null($id_nota)){
                $this->load->view('notepad/editor');
            } else {

                $editor_data['nota'] = $this->Notepad_model->obtenerNota($id_nota);

                if(!empty($editor_data['nota'])){

                    $editor_data['nota'] = $editor_data['nota'][0];
                    $this->load->view('notepad/editor',$editor_data);

                } else {

                    $error_data = [
                            'titulo' => 'Nota no encontrada',
                            'mensaje' => 'No se ha encontrado la nota en la base de datos'
                    ];

                    $this->load->view('notepad/error');
                }

            }
        } else {
            redirect(base_url());
        }

    }

    public function guardar($id = null){

        if($this->input->is_ajax_request()){
            var_dump($_POST);
        } else {
            redirect(base_url());
        }

    }

}