<?php echo $this->element('menu'); ?>
<div class="sales view large-9 medium-8 columns content">
    <h3><?= h($sale->product->name) ?> Sale</h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Product') ?></th>
            <td><?= $sale->has('product') ? $this->Html->link($sale->product->name, ['controller' => 'Products', 'action' => 'view', $sale->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Buyer Name') ?></th>
            <td><?= h($sale->buyer_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Sale Price') ?></th>
            <td><?= $this->Number->format($sale->sale_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Registered By') ?></th>
            <td><?= $sale->has('sales_registered_by') ? $this->Html->link($sale->sales_registered_by->name, ['controller' => 'Users', 'action' => 'view', $sale->sales_registered_by->id]) : ''?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($sale->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($sale->modified) ?></td>
        </tr>
    </table>  
    <a href="javascript:history.back(-1);">Back</a>
</div>