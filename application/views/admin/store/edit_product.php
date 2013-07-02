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

<div class='row'>
	<table border='0' cellpadding='6' width='100%'>
		<?php foreach($this->data['product'] as $p): ?>
						
		<tr>
			<td><img class='product-photo' src='<?php echo site_url() . "uploads/" . $p['photo']; ?>'></td>
			<td>
				<a href='<?php echo site_url() . "store/viewProduct?pid=" . $p['id']; ?>'> <?php echo $p['name']; ?></a>
				<?php echo $p['description']; ?><br />
				<strong>Price: <?php echo "$" . $this->cart->format_number($p['price']) ?></strong><br />
								
				<div class='product-button'>
					<a href='<?php echo site_url() . "admin/store/deleteProduct?pid=" . $p['id']; ?>'><button class='btn btn-danger'>Delete Product</button></a>
				</div>
			</td>
							
			<td></td>
		</tr>
						
						
		<?php endforeach; ?>
	</table>
	
	<div id='addProduct' class='product-form'>
	<?php echo form_open('admin/store/updateProduct?pid='.$_GET['pid']); ?>
		<fieldset>
		<div class='form-field'>
			<label>Product Name:</label>
			<?php echo form_input(array('name' => 'product_name', 'placeholder' => 'Product Name', 'value' => $this->data['product']['0']['name'])); ?>
			<?php echo form_error('product_name'); ?>
		</div>
		
		<div class='form-field'>
			<label>Product Price:</label>
			$ <?php echo form_input(array('name' => 'product_price', 'placeholder' => 'Product Price USD', 'value' => $this->data['product']['0']['price'] )); ?>
			<?php echo form_error('product_price'); ?>
		</div>
		
		<div class='form-field'>
			<label>Available Quantity:</label>
			<?php echo form_input(array('name' => 'quantity', 'placeholder' => 'Total Available Quantity', 'value' => $this->data['product']['0']['quantity'])); ?>
			<?php echo form_error('quantity'); ?>
		</div>
		
		<div class='form-field'>
			<label>Product Code:</label>
			<?php echo form_input(array('name' => 'product_id', 'placeholder' => 'Product Identification Number', 'value' => $this->data['product']['0']['code'])); ?>
			<?php echo form_error('product_id'); ?>
		</div>
		
		<div class='form-field'>
			<label>Product Photo:</label>
			<?php echo form_upload(array('name' => 'userfile', 'value' => $this->data['product']['0']['photo'])); ?>
			<?php echo form_error('userfile'); ?>
		</div>
		
		<div class='form-field'>
			<label>Product Description:</label>
			<?php
			
				$data = array(
					'name'        => 'product_description',
					'value'       => $this->data['product']['0']['description'],
				);

				echo form_textarea($data);
			
			?>
			<?php echo form_error('product_description'); ?>
		</div>
		
		<div class='form-field'>
			<?php echo form_submit(array('name' => 'addProduct', 'value' => 'Update Product', 'class' => 'btn btn-success')); ?>
			<?php echo form_reset(array('name' => 'clearProduct', 'value' => 'Reset Form', 'class' => 'btn btn-danger')); ?>
		</div>
		</fieldset>
	<?php echo form_close(); ?>
</div>
	
</div>