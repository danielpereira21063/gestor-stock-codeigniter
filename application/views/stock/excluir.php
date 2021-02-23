<?php
    defined('BASEPATH') OR exit('No direct script access allowed');    
?>

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 col-12">
            <div class="card p-4 text-center">
                <h4><?=$produto['designacao']?></h4>
                <p>Deseja realmente excluir o produto?</p>

                <div class="pt-3 pb-3">
                    <a class="btn btn-primary" href="<?=site_url('gestao/home')?>">Cancelar</a>
                    <a class="btn btn-danger" href="<?=site_url('gestao/excluir/').$produto['id_produto'].'/true'?>">Excluir</a>
                </div>
            </div>
        </div>
    </div>
</div>