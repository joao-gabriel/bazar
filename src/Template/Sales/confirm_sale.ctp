<?php echo $this->element('menu'); ?>
<div class="sales form large-9 medium-8 columns content"> 
  <h2><?= __('Confirm Sell'); ?></h2>
  <h4><?= __('Buyer') ?></h4>
  <p>
    <strong><?= __('Name:') ?></strong>
    <?= $this->request->data['buyer_name']; ?>
  </p>
  <p>
    <strong><?= __('Email:') ?></strong>
    <?= $this->request->data['buyer_email']; ?>
  </p>
  <p>
    <strong><?= __('Phone:') ?></strong>
    <?= $this->request->data['buyer_phone']; ?>
  </p>  
  <h4><?= __('Products') ?></h4>
  <table cellpadding="0" cellspacing="0" class="responsive">
    <?php
    $total = 0;
    $productsIds = array();
    foreach ($products as $product) {
      ?>
      <tr>
        <td><strong><?php echo $product->name; ?></strong></td>
        <?php
        if (is_null($product->sale_id)) {
          $total += $product->price;
          $productsIds[] = $product->id;
          ?><td><span class="right"><?= $this->Number->currency($product->price, 'BRL'); ?></span></td><?php
        } else {
          ?><td><span class="right"><?= __('This product has been already sold'); ?></span></td><?php
          }
          ?>
      </tr>
      <?php
    }
    if ($this->request->data['debit_card']) {
      $total = $total - ($total * 0.0239);
      ?>
      <tr>
        <td><strong>Debit Card Discount (2.39%)</strong></td>
        <td><span class="right"><?= $this->Number->currency($total * 0.0239, 'BRL'); ?></span></td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td><strong>TOTAL</strong></td>      
      <td><span class="right"><?= $this->Number->currency($total, 'BRL'); ?></span></td>
    </tr>
  </table>  
  <?= $this->Form->create($sale, ['action' => 'add']) ?>
  <fieldset>
    <?= $this->Form->input('product_id', ['type' => 'hidden', 'value' => implode(',', $productsIds)]) ?>  
    <?= $this->Form->input('sale_price', ['type' => 'hidden', 'value' => $total]) ?>
    <?= $this->Form->input('buyer_name', ['type' => 'hidden', 'value' => $this->request->data['buyer_name']]) ?>
    <?= $this->Form->input('buyer_email', ['type' => 'hidden', 'value' => $this->request->data['buyer_email']]) ?>
    <?= $this->Form->input('buyer_phone', ['type' => 'hidden', 'value' => $this->request->data['buyer_phone']]) ?>
  </fieldset>
  <a href="javascript:history.back(-1)" class="left button"><?= __('Change'); ?></a>
  <?= $this->Form->button(__('Confirm Sell')) ?>
  <?= $this->Form->end() ?>  
</div>