<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sales view large-9 medium-8 columns content">
    <h3><?= h($sale->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Product') ?></th>
            <td><?= $sale->has('product') ? $this->Html->link($sale->product->id, ['controller' => 'Products', 'action' => 'view', $sale->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Buyer Name') ?></th>
            <td><?= h($sale->buyer_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($sale->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sale Price') ?></th>
            <td><?= $this->Number->format($sale->sale_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Registered By') ?></th>
            <td><?= $this->Number->format($sale->registered_by) ?></td>
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
</div>
