<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
?>

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-6">
            <a class="btn btn-primary" href="<?=site_url('gestao/home')?>">Voltar</a>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-danger" href="<?=site_url('gestao/limparregistromovimentos')?>">Limpar registro de movimentos</a>
        </div>
    </div>
    <hr>
    <div class="mt-3 mb-3">
        <?php if(count($movimentos) > 0): ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <th class="text-left">Data</th>
                    <th class="text-center">Produto</th>
                    <th class="text-right">Movimento</th>
                </thead>
                <tbody>
                <?php foreach($movimentos as $movimento): ?>
                    <tr>
                        <td><?=$movimento['data_hora']?></td>
                        <td><?=$movimento['designacao']?></td>
                        <td><?=$movimento['quantidade']?></>
                   </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <p>Total de movimentos: <span style="font-weight: bolder;"><?=count($movimentos)?></span></p>
        <?php else: ?>
            <p>Não existem movimentos</p>
        <?php endif; ?>
    </div>
</div>