<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cliente->idcliente],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->idcliente)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->
<div class="clientes form large-12 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend>
            <h3><?= __('Editar') ?> <button style=" background-color: #f5f5f5; position: absolute;
  left: 89%; margin-top: -1%; border: none; color: white; padding: 10px;"><?= $this->Html->link(__('Listar'), ['action' => 'index']) ?></button>
            </h3>
        </legend>
        <?php
        echo $this->Form->control('nome');
        echo $this->Form->control('documento');
        echo $this->Form->control('cep');
        echo $this->Form->control('endereco');
        echo $this->Form->control('bairro');
        echo $this->Form->control('cidade');
        echo $this->Form->control('uf');
        echo $this->Form->control('telefone');
        echo $this->Form->control('email');
        echo $this->Form->control('st_ativo');
        echo $this->Form->control('st_registro_ativo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>