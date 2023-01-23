<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Sistema de usuarios';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->script(['bootstrap.min.js', 'jquery-3.6.3.min.js']) ?>
    <?= $this->Html->script(['main.js']) ?>
    <?= $this->Html->script([
        'https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js',
        'DataTables.cakephp.dataTables.js',
        'main.js'
    ]);?>
    <?= $this->Html->css(['https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css']);?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <div class="container">
        <br></br>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
