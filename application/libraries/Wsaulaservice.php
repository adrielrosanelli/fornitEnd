<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wsaulaservice {

    private $url_ws = 'http://localhost/wsTrabalhAe/';
    private $token = '1d07ab2e2811727e3167be348ac620b3a0561889';
    private $default_timeout;
    private $curl;

    public function get($endPoint =''){
        if($endPoint !=""){
        try {
            $this->curl=curl_init();
        curl_setopt($this->curl, CURLOPT_URL,$this->url_ws .$endPoint);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER,array('X-API-KEY: ' . $this->token));
        $retornoApi = curl_exec($this->curl);
        curl_close($this->curl);

        return json_decode($retornoApi);
        } catch (Throwable $th) {
            error_clear_last();
            return false;
            //throw $th;
        }

        
        }else{
            return false;
        }
        
    }
}