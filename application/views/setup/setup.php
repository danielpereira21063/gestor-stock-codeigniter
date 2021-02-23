<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row m-5">
        <div class="col-sm-6 offset-sm-3 col-8 offset-2">
            <div class="card p-4 text-center">
            
                <h3>SETUP</h3>
                <div class="text-center m-2">
                    <a class="btn btn-primary" href="<?=site_url('inicio/resetdb')?>">Reiniciar</a>
                </div>

                <div class="text-center m-2">
                    <a class="btn btn-primary" href="<?=site_url('inicio/inserirusuario')?>">Inserir usuário</a>
                </div>

                <div class="text-center m-2">
                    <a class="btn btn-primary" href="<?=site_url('inicio/inserirproduto')?>">Inserir produto</a>
                </div>

                <div class="text-center m-2">
                    <a class="btn btn-primary" href="<?=site_url('')?>">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>