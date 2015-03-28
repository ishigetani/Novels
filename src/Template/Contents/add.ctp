<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Contents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Novels'), ['controller' => 'Novels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Novel'), ['controller' => 'Novels', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contents form large-10 medium-9 columns">
    <?= $this->Form->create($content); ?>
    <fieldset>
        <legend><?= __('Add Content') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('sentence');
            echo $this->Form->input('sort');
            echo $this->Form->input('novel_id', ['options' => $novels]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
