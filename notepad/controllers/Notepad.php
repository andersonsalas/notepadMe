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
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notepad extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $helpers = ['url', 'general',];
        $libraries = ['encryption', 'session',];
        $this->load->helper($helpers);
        $this->load->library($libraries);
        $this->load->database();
        $this->load->model('Notepad_model');
    }

    public function index()
    {
        $this->load->view('general/header');
        $this->load->view('notepad/home');
        $this->load->view('general/footer');
    }

    private function nota($id, $titulo)
    {
        return '<li><a href="#" data-id="' . $id . '">' . $titulo . '</a></li>';
    }

    public function lista()
    {
        if ($this->input->is_ajax_request())
        {
            $notas = $this->Notepad_model->obtenerListaNotas();
            $output = '';
            foreach ($notas as $nota)
            {
                $output .= $this->nota($nota->id, $nota->titulo);
            }
            echo $output;
        }
        else
        {
            redirect(base_url());
        }
    }

    public function editor($id_nota = null)
    {
        if ($this->input->is_ajax_request())
        {
            if (is_null($id_nota))
            {
                $this->load->view('notepad/editor');
            }
            else
            {
                $editor_data['nota'] = $this->Notepad_model->obtenerNota($id_nota);
                if (!empty($editor_data['nota']))
                {
                    $editor_data['nota'] = $editor_data['nota'][0];
                    $this->load->view('notepad/editor', $editor_data);
                }
                else
                {
                    $error_data = ['titulo' => 'Nota no encontrada', 'mensaje' => 'No se ha encontrado la nota en la base de datos'];
                    $this->load->view('notepad/error');
                }
            }
        }
        else
        {
            redirect(base_url());
        }
    }

    public function guardar($id = null)
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->library('form_validation');
            $config = [
                ['field' => 'titulo', 'label' => '', 'rules' => 'required',],
                ['field' => 'contenido', 'label' => '', 'rules' => 'required',]
            ];
            $this->form_validation->set_rules($config);
            $result = array();
            if ($this->form_validation->run() == TRUE)
            {
                $agregarNota = ['titulo' => $this->input->post('titulo', true), 'contenido' => $this->input->post('contenido')];
                if (is_null($id))
                {
                    if (($insert_id = $this->Notepad_model->agregarNota($agregarNota)) !== false)
                    {
                        $result['error'] = false;
                        $result['insert_id'] = $insert_id;
                        $result['html'] = $this->nota($insert_id, $agregarNota['titulo']);
                    }
                    else
                    {
                        $result['error'] = true;
                    }
                }
                else
                {
                    if ($this->Notepad_model->editarNota($id, $agregarNota) !== false)
                    {
                        $result['error'] = false;
                        $result['nuevo_titulo'] = $agregarNota['titulo'];
                    }
                    else
                    {
                        $result['error'] = true;
                    }
                }
            }
            else
            {
                $result['error'] = true;
                $result['explanation'] = validation_errors();
            }
            echo json_encode($result);
        }
        else
        {
            redirect(base_url());
        }
    }

    public function borrar($id = null)
    {
        if (!is_null($id) && $this->input->is_ajax_request())
        {
            $result = array();
            if ($this->Notepad_model->borrarNota($id))
            {
                $result['error'] = false;
            }
            else
            {
                $result['error'] = true;
            }
            echo json_encode($result);
        }
        else
        {
            redirect(base_url());
        }
    }

}