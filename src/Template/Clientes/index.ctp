<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Seja Bem') ?></li>

        <li><?= $this->Html->link(__('Lista Clientes'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->


<div class="clientes index large-12 medium-8 columns content">
    <h3><?= __('Clientes') ?> <button style="  background-color: #f5f5f5; position: relative;
  left:80%; margin-top: -1%; border: none; color: white; padding: 10px;"><?= $this->Html->link(__('Novo'), ['action' => 'add']) ?></button>
        <!-- <button style=" position: relative;
  left: 70%; margin-top: -1%; border: none; color: white; padding: 10px;"><?= $this->Html->link(__('Listar'), ['action' => 'index']) ?></button>
    </h3> -->
        <table style="color:#000;" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th style="color: black;" scope="col"><?= $this->Paginator->sort('nome') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('uf') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Situação') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                        <td><?= h($cliente->nome) ?></td>
                        <td><?= h($cliente->cep) ?></td>
                        <td><?= h($cliente->cidade) ?></td>
                        <td><?= h($cliente->uf) ?></td>
                        <td><?= h($cliente->telefone) ?></td>
                        <td><?= h($cliente->email) ?></td>
                        <td>
                            <?php if ($cliente->st_ativo == '1') {
                                    echo  "ATIVO";
                                } else {
                                    echo  "INATIVO";
                                }
                                ?>







                            <!-- <?= h($cliente->st_ativo) ?> -->
                        </td>
                        <td class="actions">
                            <button style="  position: relative;
  left:5%;  border: none; color: white; padding: 5%;"> <?= $this->Html->link(__('Editar'), ['action' => 'edit', $cliente->idcliente]) ?>
                            </button>
                            <button style=" background-color: red; position: relative;
  left:5%;  border: none; color: white; padding: 5%;"> <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cliente->idcliente], ['confirm' => __('TEm certeza que deseja excluir o usuario : {0} ?', $cliente->nome)]) ?>
                            </button> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
                <?= $this->Paginator->prev('< ' . __('Anterio')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Proximo') . ' >') ?>
                <?= $this->Paginator->last(__('Anterior') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Paginas {{page}} de {{pages}}, Mostrando {{current}} Registros(s) de {{count}} total')]) ?></p>
        </div>


</div>