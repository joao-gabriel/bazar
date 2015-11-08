<?php
$cakeDescription = 'Bazar';
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

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('responsive-tables.css') ?>

    <?= $this->Html->script('modernizr.js') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('fastclick.js') ?>
    <?= $this->Html->script('foundation.min.js') ?>
    
    <?= $this->Html->script('responsive-tables.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <style>
      /* Fix for default table style set on base.css */
      .index table {
        table-layout: auto;
      }
    </style>

  </head>
  <body>
    <nav class="top-bar expanded" data-topbar role="navigation">
      <ul class="title-area large-3 medium-4 columns">
        <li class="name">
          <h1><a href=""><?= $this->fetch('title') ?></a></h1>
        </li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
          <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
        </ul>
      </section>
    </nav>
    <?= $this->Flash->render() ?>
    <section class="container clearfix">
      <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
    <script>
    $(document).ready(function(){
      $(document).foundation();
    });
</script>
  </body>
</html>
