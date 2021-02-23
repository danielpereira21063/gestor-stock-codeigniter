<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Stock extends CI_Model {
    public function tudo() {
        return $this->db->get('produtos')->result_array();
    }

    public function dadosProduto($idProduto) {
        return $this->db
        ->from('produtos')
        ->where('id_produto', $idProduto)
        ->get()->result_array();
    }

    public function editarProduto($id) {
        $designacao = $this->input->post('text_designacao');
        $resultado = $this->db->from('produtos')
        ->where('id_produto<>', $id)
        ->where('designacao', $designacao)
        ->get();

        // echo '<pre>';var_dump($resultado->result_array()); echo '</pre>';

        if($resultado->num_rows() != 0) {
            return array(
                'resultado' => false,
                'mensagem' => 'Já existe outro produto com o mesmo nome.'
            );
            exit();
        } else {
            $this->db->set('designacao', $designacao)->where('id_produto', $id)->update('produtos');
            return array(
                'resultado' => true,
                'mensagem' => ''
            );
        }
    }

    public function novoProduto() {
        $designacao = $this->input->post('text_designacao');
        $resultado = $this->db->from('produtos')
        ->where('designacao', $designacao)
        ->get();

        if($resultado->num_rows() != 0) {
            return array(
                'resultado' => false,
                'mensagem' => 'Já existe outro produto com o mesmo nome.'
            );
        } else {
            $dados = [
                'designacao' => $designacao,
                'quantidade' => 0
            ];
            $this->db->insert('produtos', $dados);
            return array(
                'resultado' => true,
                'mensagem' => ''
            );
        }
    }

    public function excluirProduto($id) {
        $this->db->delete('produtos', ['id_produto' => $id]);
    }

    public function alterarQuantidade($id,$quantidade) {
        $this->db
        ->where('id_produto', $id)
        ->set('quantidade', 'quantidade +'.$quantidade, false)
        ->update('produtos');

        $dados = [
            'id_produto' => $id,
            'quantidade' => $quantidade,
            'data_hora' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('movimentos', $dados);
    }
    
    public function movimentos() {
        return $this->db->select('m.*, p.designacao, designacao, p.quantidade temp')
        ->from('movimentos as m')
        ->join('produtos as p', 'm.id_produto = p.id_produto', 'left')
        ->get()->result_array();
    }

    public function limparMovimentos() {
        $this->db->empty_table('movimentos');
        $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');
    }
}