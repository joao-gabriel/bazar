<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav accordion" data-accordion>
    <li class="accordion-navigation">
      <a href="#panel1a" >Menu</a>
      <div id='panel1a' class='content clearfix'>
        <ul class='none'>
          <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
          <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
					<li><?= $this->Html->link(__('Sell Products'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
          <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
          <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        </ul>
      </div>
    </li>
  </ul>
  <div class='clearfix'></div>
</nav>
