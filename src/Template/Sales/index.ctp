<?php echo $this->element('menu'); ?>
<div class="sales index large-9 medium-8 columns content">
    <h3><?= __('Sales') ?></h3>
    <table cellpadding="0" cellspacing="0" class="responsive">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('product_id') ?></th>
                <th><?= $this->Paginator->sort('sale_price') ?></th>
                <th><?= $this->Paginator->sort('buyer_name') ?></th>
                <th><?= $this->Paginator->sort('When') ?></th>
                <th><?= $this->Paginator->sort('registered_by') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sales as $sale): ?>
            <tr>
                <td><?= $sale->has('product') ? $this->Html->link($sale->product->name, ['controller' => 'Products', 'action' => 'view', $sale->product->id]) : '' ?></td>
                <td><?= $this->Number->format($sale->sale_price) ?></td>
                <td><?= h($sale->buyer_name) ?></td>
                <td><?= h($sale->created) ?></td>
                <td><?= $sale->sales_registered_by->name ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sale->id]) ?>
                    <?= $this->Form->postLink(__('Return'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to return {0}?', $sale->product->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
