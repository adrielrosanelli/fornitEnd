<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    // ? O nome do metodo sempre vem acompanhado pela requisição
    // ? ou seja, contato_get significa que é uma requisição do tipo "GET"
    // ? e o usuario via requisitar apenas /rest/api/contato
    public function contato_get(){
        $retorno =[
            'status'=> true,
            'nome'=>'Adriel',
            'email'=>'adriel@gmail.com',
            'error'=>''
        ];

        // ? para enviar uma resposta, a gente chama o response
        // ? passando dois parametros: o corpo da resposta e o codigo de status
        $this->response($retorno,200);
    }
    public function contato_post(){
        $retorno =[
            'status'=> true,
            'nome'=>'Adriela',
            'email'=>'adrieli@gmail.com',
            'error'=>''
        ];

        // ? para enviar uma resposta, a gente chama o response
        // ? passando dois parametros: o corpo da resposta e o codigo de status
        $this->response($retorno,200);
    }


    public function usuario_get(){
        $this->load->model('usuario_model','um');

        $id = $this->get('id');
        if($id >0){
            $retorno = $this->um->get_one($id);
        }else{

            $retorno=$this->um->get_all();
        }
        $this->response($retorno,(($retorno) ?200:400));
    }
    
    public function usuario_post(){

        if((!$this->post('email')||(!$this->post('senha')))){
            $this->response([
                'status'=>false,
                'error'=>'Campos obrigatórios não preenchidos'
            ],400);
            return;
        }
        $dados =[

            'email'=> $this->post('email'),
            'senha'=> $this->post('senha'),
        ];
        $this->load->model('usuario_model','um');
        if($this->um->insert($dados)){
            $this->response([
                'status'=>true,
                'message'=> 'Usuário inserido com sucesso'
            ],200);
        }else{
            $this->response([
                'status'=>false,
                'error'=>'Falha ao inserir usuário'
            ],400);
        }
    }


}

/* End of file Api.php */
