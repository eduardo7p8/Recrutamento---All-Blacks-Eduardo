<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $arquivo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $arquivo->idarquivo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $arquivo->idarquivo)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Arquivos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="arquivos form large-9 medium-8 columns content">
    <?= $this->Form->create($arquivo) ?>
    <fieldset>
        <legend><?= __('Edit Arquivo') ?></legend>
        <?php
            echo $this->Form->control('no_doc');
            echo $this->Form->control('no_documento_original');
            echo $this->Form->control('ext_documento');
            echo $this->Form->control('path_documento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
