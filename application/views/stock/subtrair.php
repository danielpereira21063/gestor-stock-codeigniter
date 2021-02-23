<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container mb-5 mt-5 pb-5">


    <div class="row">
        <div class="col-sm-8 offset-sm-2 col-12">
            <div class="card p-4">
                <h4><?=$produto['designacao']?></h4>
                <p>Quantidade atual: <span style="font-weight: bolder;"><?=$produto['quantidade']?></span></p>
                <hr>
                <form method="POST" action="<?=site_url('gestao/subtrair/').$produto['id_produto']?>">
                    <div class="form-group">
                        <div class="col-sm-2 offset-sm-5 col-4 offset-4">
                            <input name="quantidade" type="number" class="form-control" value="1" min="1" max="1000">
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-danger" href="<?=site_url('gestao/home')?>">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Subtrair</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>