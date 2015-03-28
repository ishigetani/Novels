<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Content'), ['action' => 'edit', $content->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Content'), ['action' => 'delete', $content->id], ['confirm' => __('Are you sure you want to delete # {0}?', $content->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Content'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Novels'), ['controller' => 'Novels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Novel'), ['controller' => 'Novels', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contents view large-10 medium-9 columns">
    <h2><?= h($content->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Novel') ?></h6>
            <p><?= $content->has('novel') ? $this->Html->link($content->novel->name, ['controller' => 'Novels', 'action' => 'view', $content->novel->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($content->id) ?></p>
            <h6 class="subheader"><?= __('Sort') ?></h6>
            <p><?= $this->Number->format($content->sort) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($content->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($content->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Sentence') ?></h6>
            <?= $this->Text->autoParagraph(h($content->sentence)); ?>

        </div>
    </div>
</div>
