<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $novel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $novel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Novels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contents'), ['controller' => 'Contents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Content'), ['controller' => 'Contents', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="novels form large-10 medium-9 columns">
    <?= $this->Form->create($novel); ?>
    <fieldset>
        <legend><?= __('Edit Novel') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
