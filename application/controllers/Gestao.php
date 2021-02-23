<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Gestao extends CI_Controller {
    public function home() {
        if ( !$this->session->has_userdata( 'id_usuario' ) ) {
            redirect( 'inicio/login' );
        } else {
            $this->load->model( 'stock' );
            $dados['produtos'] = $this->stock->tudo();

            $this->load->view( 'layout/_header' );
            $this->load->view( 'layout/cabecalho' );
            $this->load->view( 'stock/inicio', $dados );
            $this->load->view( 'layout/rodape' );
            $this->load->view( 'layout/_footer' );
        }
    }

    public function editar( $id ) {
        $this->load->model( 'stock' );
        $dados['produto'] = [ $this->stock->dadosProduto( $id )[0] ];
        $this->load->view( 'layout/_header' );
        $this->load->view( 'layout/cabecalho' );
        $this->load->view( 'stock/editar', $dados );
        $this->load->view( 'layout/rodape' );
        $this->load->view( 'layout/_footer' );
    }

    public function salvarEdicao( $id ) {
        $this->load->model( 'stock' );
        $resultado = $this->stock->editarProduto( $id );

        if ( !$resultado['resultado'] ) {
            $dados['mensagem'] = $resultado['mensagem'];
            $dados['produto'] = $this->stock->dadosProduto( $id );
            $this->load->view( 'layout/_header' );
            $this->load->view( 'layout/cabecalho' );
            $this->load->view( 'stock/editar', $dados );
            $this->load->view( 'layout/rodape' );
            $this->load->view( 'layout/_footer' );
        } else {
            $this->home();
        }
    }

    public function novo() {
        $this->load->view( 'layout/_header' );
        $this->load->view( 'layout/cabecalho' );
        $this->load->view( 'stock/novo' );
        $this->load->view( 'layout/rodape' );
        $this->load->view( 'layout/_footer' );
    }

    public function novoGravar() {
        $this->load->model( 'stock' );
        $resultado = $this->stock->novoProduto();

        if ( !$resultado['resultado'] ) {
            $this->load->view( 'layout/_header' );
            $this->load->view( 'layout/cabecalho' );
            $this->load->view( 'stock/novo', $resultado );
            $this->load->view( 'layout/rodape' );
            $this->load->view( 'layout/_footer' );
        } else {
            $this->home();
        }
    }

    public function excluir( $id, $resposta = false ) {
        $this->load->model( 'stock' );

        if ( !$resposta ) {
            $dados['produto'] = $this->stock->dadosProduto( $id )[0];
            $this->load->view( 'layout/_header' );
            $this->load->view( 'layout/cabecalho' );
            $this->load->view( 'stock/excluir', $dados );
            $this->load->view( 'layout/rodape' );
            $this->load->view( 'layout/_footer' );
        } else {
            $this->stock->excluirProduto( $id );
            $this->home();
        }
    }

    public function adicionar( $id ) {
        $this->load->model( 'stock' );
        $dados['produto'] = $this->stock->dadosProduto( $id )[0];

        if ( is_null( $this->input->post( 'quantidade' ) ) ) {
            $this->load->view( 'layout/_header' );
            $this->load->view( 'layout/cabecalho' );
            $this->load->view( 'stock/adicionar', $dados );
            $this->load->view( 'layout/rodape' );
            $this->load->view( 'layout/_footer' );
        } else {
            $this->stock->alterarQuantidade( $id, $this->input->post( 'quantidade' ) );
            $this->home();
        }
    }

    public function subtrair( $id ) {
        $this->load->model( 'stock' );
        $dados['produto'] = $this->stock->dadosProduto( $id )[0];

        if ( is_null( $this->input->post( 'quantidade' ) ) ) {
            $this->load->view( 'layout/_header' );
            $this->load->view( 'layout/cabecalho' );
            $this->load->view( 'stock/subtrair', $dados );
            $this->load->view( 'layout/rodape' );
            $this->load->view( 'layout/_footer' );
        } else {
            $this->stock->alterarQuantidade( $id, -$this->input->post( 'quantidade' ) );
            $this->home();
        }
    }
    
    public function movimentos() {
        $this->load->model('stock');
        $dados['movimentos'] = $this->stock->movimentos();
        $this->load->view( 'layout/_header' );
        $this->load->view( 'layout/cabecalho' );
        $this->load->view( 'stock/movimentos', $dados );
        $this->load->view( 'layout/rodape' );
        $this->load->view( 'layout/_footer' );
    }

    public function limparRegistroMovimentos() {
        $this->load->model('stock');
        $this->stock->limparMovimentos();
        $this->movimentos();
    }
}