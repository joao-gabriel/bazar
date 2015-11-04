<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($product->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($product->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Owner') ?></th>
            <td><?= $this->Number->format($product->owner) ?></td>
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
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sales') ?></h4>
        <?php if (!empty($product->sales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Sale Price') ?></th>
                <th><?= __('Buyer Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Registered By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->sales as $sales): ?>
            <tr>
                <td><?= h($sales->id) ?></td>
                <td><?= h($sales->product_id) ?></td>
                <td><?= h($sales->sale_price) ?></td>
                <td><?= h($sales->buyer_name) ?></td>
                <td><?= h($sales->created) ?></td>
                <td><?= h($sales->modified) ?></td>
                <td><?= h($sales->registered_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sales', 'action' => 'view', $sales->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sales', 'action' => 'edit', $sales->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sales', 'action' => 'delete', $sales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sales->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>