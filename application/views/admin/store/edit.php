<h2>Store Manager - Edit Products</h2>


<div class='row'>
	<div class='navbar'>
		<ul class='nav nav-pills'>
			<li><a href='<?php echo site_url() . 'admin/store'; ?>'>Store Home</a></li>
			<li class='active dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Products<b style='position: relative; bottom:2px;' class='caret'></b></a>
				<ul class='dropdown-menu'>
					<li><a href='<?php echo site_url() . 'admin/store/addProduct'; ?>'>Add Products</a></li>
					<li class='active'><a href='<?php echo site_url() . 'admin/store/editProduct'; ?>'>Edit Products</a></li>
				</ul>
			</li>
			<li><a href='<?php echo site_url() . 'admin/store/viewOrders'; ?>'>View Orders</a></li>
		</ul>
	</div>
</div>

<div class='message'>
	<?php echo $this->session->flashdata('msg'); ?>
</div>

<hr />

<div class='row'>
	<table border='0' cellpadding='6' width='100%'>
		<?php foreach($this->data['products'] as $p): ?>
						
		<tr>
			<td><img class='product-photo' src='<?php echo site_url() . "uploads/" . $p['photo']; ?>'></td>
			<td>
				<a href='<?php echo site_url() . "store/viewProduct?pid=" . $p['id']; ?>'> <?php echo $p['name']; ?></a>
				<?php echo word_limiter($p['description'], 30); ?><br />
				<strong>Price: <?php echo "$" . $this->cart->format_number($p['price']) ?></strong><br />			
								
				<div class='product-button'>
					<a href='<?php echo site_url() . "admin/store/updateProduct?pid=" . $p['id']; ?>'><button class='btn btn-primary'>Edit Product</button></a>
					<a href='<?php echo site_url() . "admin/store/deleteProduct?pid=" . $p['id']; ?>'><button class='btn btn-danger'>Delete Product</button></a>
				</div>
			</td>
							
			<td></td>
		</tr>
						
						
		<?php endforeach; ?>
	</table>
</div>