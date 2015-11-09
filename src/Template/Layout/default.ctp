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
      #actions-sidebar .active {
        height: 370px;
      }
      #actions-sidebar .active ul li{
        list-style: none;
        background-color: #008CBA;
        padding: 5px;
      }
      #actions-sidebar .active ul li a{
        color: #fff;
      }
    </style>

  </head>
  <body>
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
