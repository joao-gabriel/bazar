<?php echo $this->element('menu'); ?>
<div class="sales index large-9 medium-8 columns content">
  <h3><?= __('Sales By Product Owner') ?></h3>
	<?= $this->Html->link(__('View All Sales'), [
		'controller' => 'sales',
		'action' => 'index'
		], ['class' => 'button'])  ?>
	<?= $this->Form->create('ownerFilter', ['type' => 'get']); ?>
	<?= $this->Form->input('owner', ['options' => $users, 'empty' => 'All']); ?>
	<?= $this->Form->button(__('Filter')) ?>
	<?= $this->Form->end(); ?>
	<?php if (isset($sales) && count($sales)>0) { ?>

		<table cellpadding="0" cellspacing="0" class="responsive">
			<thead>
				<tr>
					<th><?= __('Buyer Name')?></th>
					<th><?= __('When') ?></th>
					<th><?= __('Debit Card') ?></th>
					<th><?= __('Product'); ?></th>
					<th><?= __('Price') ?></th>
					<th><?= __('Price with Debit Card Discounts') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$total = 0;
				foreach ($sales as $sale):
				$discountedPrice = $sale->product_sale->debit_card?
					$sale->price - ($sale->price * 0.0239):
					$sale->price;
					$total += $discountedPrice;
				 ?>
					<tr style="vertical-align: top">
						<td><?= h($sale->product_sale->buyer_name) ?></td>
						<td><?= h($sale->product_sale->created) ?></td>
						<td><?= $sale->product_sale->debit_card ? __('Yes') : __('No') ?></td>
						<td><?= $sale->name; ?></td>
						<td><?= $this->Number->currency($sale->price, 'BRL') ?></td>
						<td><?= $this->Number->currency($discountedPrice, 'BRL') ?></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td><strong><?=__('Total');?></strong></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><strong><?= $this->Number->currency($total, 'BRL')?></strong></td>
				</tr>
			</tbody>
		</table>
	<?php } ?>
</div>
