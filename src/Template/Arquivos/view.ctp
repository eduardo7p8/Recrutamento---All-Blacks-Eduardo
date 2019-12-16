<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $arquivo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Arquivo'), ['action' => 'edit', $arquivo->idarquivo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Arquivo'), ['action' => 'delete', $arquivo->idarquivo], ['confirm' => __('Are you sure you want to delete # {0}?', $arquivo->idarquivo)]) ?> </li>
        <li><?= $this->Html->link(__('List Arquivos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arquivo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="arquivos view large-9 medium-8 columns content">
    <h3><?= h($arquivo->idarquivo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('No Doc') ?></th>
            <td><?= h($arquivo->no_doc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Documento Original') ?></th>
            <td><?= h($arquivo->no_documento_original) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ext Documento') ?></th>
            <td><?= h($arquivo->ext_documento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idarquivo') ?></th>
            <td><?= $this->Number->format($arquivo->idarquivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($arquivo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($arquivo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Path Documento') ?></h4>
        <?= $this->Text->autoParagraph(h($arquivo->path_documento)); ?>
    </div>
</div>
