    	<!-- Main content -->
 		<div class="span9">
 			<article>
 				<h2><?php echo $this->data['product']['0']['name']; ?></h2> 				

					<img class='full-product-photo' src='<?php echo site_url() . "uploads/" . $this->data['product']['0']['photo']; ?>'>

					<div class='product-info'>
					
						<?php echo $this->data['product']['0']['description']; ?>
						
						<strong>Price: </strong> $<?php echo $this->cart->format_number($this->data['product']['0']['price']); ?><br />
						<strong>Quantity: </strong><?php if($this->data['product']['0']['quantity'] < 1) : echo "<span class='error'>Out of Stock</span>"; else : echo $this->data['product']['0']['quantity']; endif; ?>	
						
						<div class='product-button'>
							<a href='<?php echo site_url() . 'store/addCartItem?pid=' . $this->data['product']['0']['id']; ?>'><button class='btn btn-primary'>Add to Cart</button></a>
						</div>
						
					</div>
	
 			</article>
			
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="span3 sidebar">
		
 			<div class='title'><a href='<?php echo site_url() . 'store/viewCart'; ?>'>Shopping Cart</a></div>
			
            <?php $this->load->view('sidebars/store-sidebar'); ?>
 		</div>