<?php echo $this->element('menu'); ?>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
		<?= $this->Form->create('ownerFilter', ['type' => 'get']); ?>
		<?= $this->Form->input('owner', ['options' => $users, 'empty' => 'All']); ?>
		<?= $this->Form->button(__('Filter')) ?>
    <?= $this->Form->end(); ?>
    <p><?= __('Gray rows means that product has been sold.'); ?></p>
    <table cellpadding="0" cellspacing="0" class="responsive">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', __('Code')) ?></th>
                <th><?= $this->Paginator->sort('name', __('Name')) ?></th>
                <th><?= $this->Paginator->sort('ProductOwner.name', __('Owner')) ?></th>
                <th><?= $this->Paginator->sort('ProductCreatedBy.name', __('Created By')) ?></th>
                <th><?= $this->Paginator->sort('price', __('Price')) ?></th>
                <th><?= $this->Paginator->sort('created', __('Created')) ?></th>
                <th><?= $this->Paginator->sort('modified', __('Modified')) ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr <?php echo !empty($product->sale)?'style="background-color:#ccc"':'' ?>>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= $product->product_owner->name ?></td>
                <td><?= $product->product_created_by->name ?></td>
                <td><?= $this->Number->format($product->price) ?></td>
                <td><?= h($product->created) ?></td>
                <td><?= h($product->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete {0}?', $product->name)]) ?>
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
     <?= $this->Html->link(__('Print Labels for All Products'), ['action' => 'printlabels'], ['class' => 'button', 'target' => '_blank']) ?>
</div>
