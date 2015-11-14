<?php echo $this->element('menu'); ?>
<div class="sales form large-9 medium-8 columns content">
  <?= $this->Form->create($sale) ?>
  <fieldset>
    <legend><?= __('Confirm sell') ?></legend>
    <?php
    $total = 0;
    foreach ($products as $product) {
      ?>
      <div>
        <p>
          <strong><?php echo $product->name; ?></strong>
          <span class="right"><?= $product->price; ?></span>
          <div style="border-bottom: 2px dotted #000; bottom: 2px"></div>
        </p>
      </div>
      <?php
      $total += $product->price;
    }
    ?>
    <div>
      <p>
        <strong>TOTAL</strong>
        <span class="right"><?= $total; ?></span>
        <div style="border-bottom: 2px dotted #000; bottom: 2px"></div>
      </p>
    </div>    
  </fieldset>
  <a href="javascript:history.back(-1)" class="left button"><?=__('Modificar');?></a>
  <?= $this->Form->button(__('Submit')) ?>
  <?= $this->Form->end() ?>  
</div>