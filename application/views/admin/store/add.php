<h2>Store Manager - Add Products</h2>


<div class='row'>
	<div class='navbar'>
		<ul class='nav nav-pills'>
			<li><a href='<?php echo site_url() . 'admin/store'; ?>'>Store Home</a></li>
			<li class='active dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Products<b style='position: relative; bottom:2px;' class='caret'></b></a>
				<ul class='dropdown-menu'>
					<li class='active'><a href='<?php echo site_url() . 'admin/store/addProduct'; ?>'>Add Products</a></li>
					<li><a href='<?php echo site_url() . 'admin/store/editProduct'; ?>'>Edit Products</a></li>
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

<div id='addProduct' class='product-form'>
	<?php echo form_open_multipart(); ?>
		<fieldset>
		<div class='form-field'>
			<label>Product Name:</label>
			<?php echo form_input(array('name' => 'product_name', 'placeholder' => 'Product Name')); ?>
			<?php echo form_error('product_name'); ?>
		</div>
		
		<div class='form-field'>
			<label>Product Price:</label>
			$ <?php echo form_input(array('name' => 'product_price', 'placeholder' => 'Product Price USD')); ?>
			<?php echo form_error('product_price'); ?>
		</div>
		
		<div class='form-field'>
			<label>Available Quantity:</label>
			<?php echo form_input(array('name' => 'quantity', 'placeholder' => 'Total Available Quantity')); ?>
			<?php echo form_error('quantity'); ?>
		</div>
		
		<div class='form-field'>
			<label>Product Code:</label>
			<?php echo form_input(array('name' => 'product_id', 'placeholder' => 'Product Identification Number')); ?>
			<?php echo form_error('product_id'); ?>
		</div>
		
		<div class='form-field'>
			<label>Product Photo:</label>
			<?php echo form_upload('userfile'); ?>
			<?php echo form_error('userfile'); ?>
		</div>
		
		<div class='form-field'>
			<label>Product Description:</label>
			<?php echo form_textarea(array('name' => 'product_description', 'placeholder' => 'Product Description')); ?>
			<?php echo form_error('product_description'); ?>
		</div>
		
		<div class='form-field'>
			<?php echo form_submit(array('name' => 'addProduct', 'value' => 'Add Product', 'class' => 'btn btn-success')); ?>
			<?php echo form_reset(array('name' => 'clearProduct', 'value' => 'Reset Form', 'class' => 'btn btn-danger')); ?>
		</div>
		</fieldset>
	<?php echo form_close(); ?>
</div>