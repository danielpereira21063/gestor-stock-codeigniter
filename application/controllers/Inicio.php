<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Inicio extends CI_Controller {

    public function index() {
        if ( $this->session->has_userdata( 'id_usuario' ) ) {
            $this->menuInicial();
        } else {
            $this->login();
        }
    }

    public function menuInicial() {
        if ( !$this->session->has_userdata( 'id_usuario' ) ) {
            $this->login();
        } else {
            redirect( 'gestao/home' );
        }
    }

    public function setup() {
        $this->load->view( 'layout/_header' );
        $this->load->view( 'setup/setup' );
        $this->load->view( 'layout/_footer' );
    }

    public function resetdb() {
        //Limpa todos os dados do banco de dados
        $this->load->model( 'Basedados' );
        $this->Basedados->reset();

        $this->load->view( 'layout/_header' );
        $this->load->view( 'setup/setup' );

        $dados = [
            'mensagem' => 'Sistema de base de dados reiniciado com sucesso',
            'tipo' => 'success'
        ];

        $this->load->view( 'layout/mensagem', $dados );
        $this->load->view( 'layout/_footer' );
    }

    public function inserirUsuario() {
        $this->load->model( 'basedados' );
        $this->basedados->inserirUsuario();
        $this->load->view( 'layout/_header' );
        $this->load->view( 'setup/setup' );

        $dados = [
            'mensagem' => 'Usuario cadastrado com sucesso',
            'tipo' => 'success'
        ];

        $this->load->view( 'layout/mensagem', $dados );
        $this->load->view( 'layout/_footer' );
    }

    
    public function inserirProduto() {
        $this->load->model( 'basedados' );
        $this->basedados->inserirProduto();
        $this->load->view( 'layout/_header' );
        $this->load->view( 'setup/setup' );

        $dados = [
            'mensagem' => 'Produto cadastrado com sucesso',
            'tipo' => 'success'
        ];

        $this->load->view( 'layout/mensagem', $dados );
        $this->load->view( 'layout/_footer' );
    }

    public function login() {
        if ( $this->session->has_userdata( 'id_usuario' ) ) {
            $this->menuInicial();
        }
        $this->load->view( 'layout/_header' );
        $this->load->view( 'layout/cabecalho' );
        $this->load->view( 'usuarios/login' );
        $this->load->view( 'layout/rodape' );
        $this->load->view( 'layout/_footer' );

    }

    public function verificarLogin() {
        if ( $this->session->has_userdata( 'id_usuario' ) ) {
            $this->menuInicial();
        } else {
            $this->load->model( 'usuarios' );
            if ( $this->usuarios->verificarLogin() ) {
                $this->menuInicial();
            } else {
                $this->loginInvalido();
            }
        }
    }

    public function loginInvalido() {
        if ( $this->session->has_userdata( 'id_usuario' ) ) {
            $this->menuInicial();
        } else {
            $dados = [
                'mensagem' => 'Usuario ou senha incorretos',
                'tipo' => 'danger',
                'link' => 'inicio'
            ];
            $this->load->view( 'layout/_header' );
            $this->load->view( 'layout/cabecalho' );
			$this->load->view('layout/mensagem', $dados);
            $this->load->view( 'usuarios/login' );
            $this->load->view( 'layout/rodape' );
            $this->load->view( 'layout/_footer' );

        }
    }

	public function logout() {
		if($this->session->has_userdata('id_usuario')) {
			$this->session->unset_userdata('id_usuario');
			$this->session->unset_userdata('usuario');
		}
		$this->menuInicial();
	}
}
