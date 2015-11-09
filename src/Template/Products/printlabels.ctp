<?php foreach ($products as $product): ?>          
  <div>
    <h1><?= $this->Number->currency($product->price, 'BRL') ?></h1>
    <h2>Cod. <?= $this->Number->format($product->id) ?></h2>
    <p><strong><?= h($product->name) ?></strong></p>
    <p><?= $product->product_owner->name ?></p>
  </div>
<?php endforeach; ?>