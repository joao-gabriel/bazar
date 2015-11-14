<?php echo $this->element('menu'); ?>
<div class="sales form large-9 medium-8 columns content">
  <?= $this->Form->create($sale, ['action' => 'confirmSale']) ?>
  <fieldset>
    <legend><?= __('Sell Products') ?></legend>
    <?php
    echo $this->Form->input('debit_card', ['id' => 'debit_card', 'type' => 'checkbox']);
    echo $this->Form->input('buyer_name');
    echo $this->Form->input('buyer_email');
    echo $this->Form->input('buyer_phone');
    echo $this->Form->input('product_id', [
        'type' => 'number',
        'name' => 'product_id[]',
        'class' => 'product_id',
        'required' => 'required'
    ]);
    echo $this->Form->button(__('Add one more Product'), [
        'type' => 'button',
        'class' => 'btn_add_product left'
    ]);
    echo $this->Form->button(__('Remove last Product'), [
        'type' => 'button',
        'class' => 'btn_remove_product left alert'
    ]);
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'right']) ?>
  </fieldset>
  <?= $this->Form->end() ?>
</div>
<script>
  $(document).ready(function() {
    $('.btn_add_product').click(function() {
      var product_field = $(this).prev(),
              new_product_field = product_field.clone();
      new_product_field.find('.product_id').val('');
      $(this).before(new_product_field).find('.product_id').focus();
    });
    $('.btn_remove_product').click(function() {
      if ($('.product_id').length > 1) {
        var product_field = $(this).prev().prev('.input');
        product_field.remove();
      }else{
        alert("<?=__('Your sell must contain at least one product')?>");
      }
    });
  });
</script>
