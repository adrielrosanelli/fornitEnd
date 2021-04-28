<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public $data;
    
    public function __construct()
    {
        parent::__construct();
        $this->$data['url'] = $this->config->base_url();
    }
    

    public function index()
    {
     $this->load->view('header',$this->data);   

     $curl=curl_init();
    curl_setopt($curl, CURLOPT_URL,'http://localhost/wsTrabalhAe/rest/api/usuario');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array('X-API-KEY: 1d07ab2e2811727e3167be348ac620b3a0561889'));
    $retornoApi = curl_exec($curl);
    curl_close($curl);
        $this->data['usuarios']= json_decode($retornoApi);


     $this->load->view('listaUsuarios',$this->data);   
     $this->load->view('footer',$this->data);   
    }

}

/* End of file Usuario.php */
