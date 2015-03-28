<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Novel'), ['action' => 'edit', $novel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Novel'), ['action' => 'delete', $novel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $novel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Novels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Novel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contents'), ['controller' => 'Contents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Content'), ['controller' => 'Contents', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="novels view large-10 medium-9 columns">
    <h2><?= h($novel->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($novel->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($novel->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($novel->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($novel->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Contents') ?></h4>
    <?php if (!empty($novel->contents)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Title') ?></th>
            <th><?= __('Order') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($novel->contents as $index => $contents): ?>
        <?php $page = $index + 1; ?>
        <tr>
            <td><?= $this->Html->link(h($contents->title), ['controller' => 'Contents', 'action' => 'read', $novel->id, '?page='. $page], ['escape' => false]) ?></td>
            <td><?= h($contents->order) ?></td>
            <td><?= h($contents->created) ?></td>
            <td><?= h($contents->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Contents', 'action' => 'view', $contents->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Contents', 'action' => 'edit', $contents->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contents', 'action' => 'delete', $contents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contents->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
