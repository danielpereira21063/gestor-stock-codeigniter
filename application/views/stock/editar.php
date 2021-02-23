<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container mb-5 mt-5">


    <div class="row">
        <div class="col-sm-8 offset-sm-2 col-12">
            <div class="card p-4">
                <h3><?=$produto[0]['designacao'];?></h3>
                <hr>
                <form method="POST" action="<?=site_url('gestao/salvaredicao/').$produto[0]['id_produto']?>">
                    <div class="form-group">
                        <label for="">Designação</label>
                        <input type="text" name="text_designacao" class="form-control" placeholder="Nome do produto" value="<?=$produto[0]['designacao']?>" required>
                    </div>

                    <?php if(isset($mensagem)): ?>

                    <div class="alert alert-danger tetx-center">
                        <?=$mensagem?>
                    </div>

                    <?php endif; ?>

                    <div class="text-center">
                        <a class="btn btn-danger" href="<?=site_url('gestao/home')?>">Cancelar</a>
                        <button class="btn btn-primary" href="<?=site_url('gestao/salvaredicao').$produto[0]['id_produto']?>">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>