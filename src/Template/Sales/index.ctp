<?php echo $this->element('menu'); ?>
<div class="sales index large-9 medium-8 columns content">
  <h3><?= __('Sales') ?></h3>
  <?= $this->Html->link(__('View Sales by Product Owner'), [
			'controller' => 'products',
			'action' => 'sold'
		],
		['class' => 'button'])  ?>
  <table cellpadding="0" cellspacing="0" class="responsive">
    <thead>
      <tr>
        <th><?= $this->Paginator->sort('buyer_name') ?></th>
        <th><?= $this->Paginator->sort('When') ?></th>
        <th><?= $this->Paginator->sort('registered_by') ?></th>
        <th><?= $this->Paginator->sort('debit_card') ?></th>
        <th><?= __('Products'); ?></th>
        <th><?= $this->Paginator->sort('sale_price') ?></th>
        <!--<th class="actions"><?= __('Actions') ?></th>-->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($sales as $sale): ?>
        <tr style="vertical-align: top">
          <td><?= h($sale->buyer_name) ?></td>
          <td><?= h($sale->created) ?></td>
          <td><?= $sale->sales_registered_by->name ?></td>
          <td><?= $sale->debit_card ? __('Yes') : __('No') ?></td>
          <td>
            <table>
              <?php ?>
              <?php
              $total = 0;
              foreach ($sale->products as $product):
                $total += $product->price;
                ?>
                <tr>
                  <td><?= $product->name; ?></td>
                  <td><?= $product->product_owner->name; ?></td>
                  <td class='right'><?= $this->Number->currency($product->price, 'BRL') ?></td>
                </tr>
                <?php
              endforeach;
              if ($sale->debit_card) {
                ?>
                <tr>
                  <td></td>
                  <td><strong class='right'><?= __('Total with discounts'); ?></strong></td>
                  <td class="right"><?= $this->Number->currency($total-($total*0.0239), 'BRL') ?></td>
                </tr>
                <?php
              }
              ?>
            </table>
          </td>
          <td><?= $this->Number->currency($sale->sale_price, 'BRL') ?></td>
          <!--<td class="actions">-->
            <?php //= $this->Html->link(__('View'), ['action' => 'view', $sale->id]) ?>
            <?php // $this->Form->postLink(__('Return'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to return sell {0}?', $sale->id)]) ?>
          <!--</td>-->
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
