<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $arquivos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Arquivo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="arquivos index large-9 medium-8 columns content">
    <h3><?= __('Arquivos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idarquivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_doc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_documento_original') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ext_documento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arquivos as $arquivo): ?>
            <tr>
                <td><?= $this->Number->format($arquivo->idarquivo) ?></td>
                <td><?= h($arquivo->no_doc) ?></td>
                <td><?= h($arquivo->no_documento_original) ?></td>
                <td><?= h($arquivo->ext_documento) ?></td>
                <td><?= h($arquivo->created) ?></td>
                <td><?= h($arquivo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $arquivo->idarquivo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $arquivo->idarquivo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $arquivo->idarquivo], ['confirm' => __('Are you sure you want to delete # {0}?', $arquivo->idarquivo)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
