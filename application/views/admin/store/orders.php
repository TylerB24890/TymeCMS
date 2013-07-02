<h2>Store Manager - View Orders</h2>


<div class='row'>
	<div class='navbar'>
		<ul class='nav nav-pills'>
			<li><a href='<?php echo site_url() . 'admin/store'; ?>'>Store Home</a></li>
			<li class='dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Products<b style='position: relative; bottom:2px;' class='caret'></b></a>
				<ul class='dropdown-menu'>
					<li><a href='<?php echo site_url() . 'admin/store/addProduct'; ?>'>Add Products</a></li>
					<li><a href='<?php echo site_url() . 'admin/store/editProduct'; ?>'>Edit Products</a></li>
				</ul>
			</li>
			<li class='active'><a href='<?php echo site_url() . 'admin/store/viewOrders'; ?>'>View Orders</a></li>
		</ul>
	</div>
</div>

<div class='message'>
	<?php echo $this->session->flashdata('msg'); ?>
</div>

<hr />

<div class='row'>
	<ul class='products'>
		<?php if(empty($this->data['orders'])) : ?>
			<div class='error'>There are no orders</div>
		<?php else : ?>
			<?php foreach($this->data['orders'] as $order) : ?>
				
				<li><?php print_r($order); ?></li>
			
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>