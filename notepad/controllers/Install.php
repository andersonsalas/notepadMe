<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $helpers = [
            'url',
            'general', # Funciones generales de notepadMe!
        ];
        $libraries = [
            'encryption',
            'session',
        ];

        $this->load->helper($helpers);
        $this->load->library($libraries);

        $this->load->database();

    }

    public function overview(){

        $this->load->view('general/html_header');
        $this->load->view('general/header');
        $this->load->view('install/overview');
        $this->load->view('general/footer');

    }

}