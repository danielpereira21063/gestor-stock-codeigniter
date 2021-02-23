<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {
    public function verificarLogin() {
        $dados = [
            $this->input->post( 'text_usuario' ),
            $this->input->post( 'text_senha' )
        ];

        $resultado = $this->db
            ->from('usuarios')
            ->where('usuario', $dados[0])
            ->where('senha', md5($dados[1]))
            ->get();

        if($resultado->num_rows() > 0) {
            $dados_usuario = $resultado->row();
            $this->session->set_userdata('id_usuario', $dados_usuario->id_usuario);
            $this->session->set_userdata('usuario', $dados_usuario->usuario);
            return true;
        } else {
            return false;
        }
    }
}