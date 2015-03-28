<?php
/**
 * Created by PhpStorm.
 * User: ishigetani
 * Date: 2015/03/28
 * Time: 15:42
 */
?>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css'); ?>
    <?= $this->fetch('meta') ?>
    <meta name="viewport" content="width=device-width">
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="container">
    <?= $this->Flash->render() ?>
    <div class="row">
        <?= $this->fetch('content') ?>
    </div>
</div>
</body>
</html>
