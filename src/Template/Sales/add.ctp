<?php echo $this->element('menu'); ?>
<div class="sales form large-9 medium-8 columns content">
    <?= $this->Form->create($sale) ?>
    <fieldset>
        <legend><?= __('Add Sale') ?></legend>
        <?php
            echo $this->Form->input('product_id');
            echo $this->Form->input('sale_price');
            echo $this->Form->input('debit_card', ['id' => 'debit_card', 'type' => 'checkbox']);
            echo $this->Form->input('buyer_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
var price_debit, price;
$('#debit_card').click(function(){
  var price = parseFloat($('#sale-price').val());
  if ($(this).is(':checked')){
    $('#sale-price').val(price-(price*0.03));
  }else{
    $('#sale-price').val(price+(price*0.03));
  }
  console.log(price);
});
</script>
