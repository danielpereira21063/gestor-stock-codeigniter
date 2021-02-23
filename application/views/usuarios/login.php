<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="row m-5">
        <div class="col-sm-6 offset-sm-3 col-8 offset-2">
            <div class="card p-4">
            
                <h3>Login</h3>

                <form action="<?=site_url('inicio/verificarlogin')?>" method="POST">
                    <div class="form-group">
                        <input class="form-control" type="text" name="text_usuario" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="text_senha" placeholder="Senha" required>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>