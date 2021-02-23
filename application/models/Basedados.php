<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
class Basedados extends CI_Model {
    public function reset() {
        //faz um reset na base de dados
        
        $this->db->empty_table( 'usuarios' );
        $this->db->empty_table( 'produtos' );
        $this->db->empty_table( 'movimentos' );
        
        $this->db->query( 'ALTER TABLE usuarios AUTO_INCREMENT = 1' );
        $this->db->query( 'ALTER TABLE produtos AUTO_INCREMENT = 1' );
        $this->db->query( 'ALTER TABLE movimentos AUTO_INCREMENT = 1' );
        
    }
    
    public function inserirUsuario() {
        $dados = array(
            'usuario' => 'admin',
            'senha' => md5( 'admin' )
        );
        $this->db->insert( 'usuarios', $dados );
    }
    
    public function inserirProduto() {
        $dados  = [
            [ 'designacao' => 'CPUs',           'quantidade' => '9' ],
            [ 'designacao' => 'Memórias',       'quantidade' => '13' ],
            [ 'designacao' => 'Monitores',      'quantidade' => '4' ],
            [ 'designacao' => 'Discos rígidos', 'quantidade' => '32' ]
            
        ];
        $this->db->insert_batch('produtos', $dados);

        $dados = [];
        
        
        $dados = [
            [
                'id_produto' => 1,
                'quantidade' => 9,
                'data_hora' => date('Y-m-d H:m:s')
            ],
            [
                'id_produto' => 2,
                'quantidade' => 13,
                'data_hora' => date('Y-m-d H:m:s')
            ],
            [
                'id_produto' => 3,
                'quantidade' => 4,
                'data_hora' => date('Y-m-d H:m:s')
            ],
            [
                'id_produto' => 4,
                'quantidade' => 32,
                'data_hora' => date('Y-m-d H'.':m:s')
            ]
                
        ];
            
            $this->db->insert_batch('movimentos', $dados);
            
        }
    }