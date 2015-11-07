<?php echo $this->element('menu'); ?>
<div class="sales form large-9 medium-8 columns content">
    <?= $this->Form->create($sale) ?>
    <fieldset>
        <legend><?= __('Add Sale') ?></legend>
        <?php
            echo $this->Form->input('product_name', ['disabled' => 'disabled']);
            echo $this->Form->input('sale_price');
            echo $this->Form->input('buyer_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
