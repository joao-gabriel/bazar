<?php echo $this->element('menu'); ?>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Html->link($product->product_created_by->name, ['controller' => 'Users', 'action' => 'view', $product->product_created_by->id])?></td>
        </tr>
        <tr>
            <th><?= __('Owner') ?></th>
            <td><?= $this->Html->link($product->product_owner->name, ['controller' => 'Users', 'action' => 'view', $product->product_owner->id])?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
    <div class="related">
      <?php if (!empty($product->sale)): ?>
        <?php echo '<h5>Vendido para '.$product->sale->buyer_name.' por '.$product->sale->sale_price.'</h5>'; ?>
        <?= $this->Html->link(__('Sale Details'), ['controller' => 'Sales', 'action' => 'view', $product->sale->id], ['class' => 'button radius']); ?>
      <?php else: ?>
        <?= $this->Html->link(__('Sell'), ['controller' => 'Sales', 'action' => 'add', $product->id], ['class' => 'button radius']); ?>  
      <?php endif; ?>
    </div>
    <a href="javascript:history.back(-1);">Back</a>
</div>
