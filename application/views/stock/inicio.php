<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
?>

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-sm-8 col-12 text-left">
            <a class="btn btn-primary" href="<?=site_url('gestao/novo')?>">Novo produto</a>
            <a class="btn btn-primary" href="<?=site_url('gestao/movimentos')?>">Movimentos</a>
        </div>
        <div class="col-sm-4 col-12 text-right">
            <a class="btn btn-danger" href="<?=site_url('inicio/logout')?>">Sair</a>
        </div>
    </div>
    <hr>
    <div class="mt-3 mb-3">
        <?php if(count($produtos) > 0): ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <th class="text-left">Produto</th>
                    <th class="text-center">Quantidade</th>
                    <th></th>
                </thead>
                <tbody>
                <?php foreach($produtos as $produto): ?>
                    <tr style="font-size: 11pt;">
                        <td class="text-left"><a class="mr-3" href="<?=site_url('gestao/editar/').$produto['id_produto']?>"><i class="fa fa-pencil"></i></a><?=$produto['designacao']?></td>
                        <td class="text-center"><?=$produto['quantidade']?></td>
                        <td class="text-right">
                            <a class="mr-3" href="<?=site_url('gestao/adicionar/').$produto['id_produto']?>"><i class="fa fa-plus-square"></i></a>
                            <a class="mr-3" href="<?=site_url('gestao/subtrair/').$produto['id_produto']?>"><i class="fa fa-minus-square"></i></a>
                            <a class="mr-3" href="<?=site_url('gestao/excluir/').$produto['id_produto']?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <p>Total de produtos: <span style="font-weight: bold;"><?=count($produtos)?></span></p>
        <?php else: ?>
            <p>Não existem produtos registrados</p>
        <?php endif; ?>
    </div>
</div>