<?php
/**
 * Created by PhpStorm.
 * User: n1220012
 * Date: 2015/03/28
 * Time: 15:41
 */?>
<?php foreach($contents as $content): ?>
    <h2><?= h($novel->name); ?> <small><?= h($content->title); ?></small></h2>
    <?= nl2br(h($content->sentence)) ?>
<?php endforeach; ?>
<nav>
    <ul class="pager">
        <?php $this->Paginator->options(['url' => ['controller' => 'Contents', 'action' => 'read', $this->request->params['pass'][0]]]); ?>
        <?= $this->Paginator->prev('&larr; ' . __('previous'), array('escape' => false)) ?>
        <?= $this->Paginator->next(__('next') . ' &rarr;', array('escape' => false)) ?>
    </ul>
</nav>
<?= $this->Html->link('戻る', ['controller' => 'Novels', 'action' => 'view', $novel->id], ['class' => 'btn btn-default']); ?>