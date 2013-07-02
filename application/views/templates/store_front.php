    	<!-- Main content -->
 		<div class="span9">
 			<article>
 				<h2><?php echo e($page->title); ?></h2>
				
 				<?php echo $page->body; ?> 
				
				<hr />
				
				<?php 
					
					//display js alert window if item is out of stock
					echo $this->session->flashdata('msg'); 

				?>
				
				<table border='0' cellpadding='6' width='100%'>
				<?php foreach($this->data['products'] as $p): ?>
					
					<tr>
				
						<td><img class='product-photo' src='<?php echo site_url() . "uploads/" . $p['photo']; ?>'></td>
						<td>
							<strong><a href='<?php echo site_url() . "store/viewProduct?pid=" . $p['id']; ?>'> <?php echo $p['name']; ?></a></strong>
							<?php echo word_limiter($p['description'], 30); ?><br />
							<strong>Price: <?php echo "$" . $this->cart->format_number($p['price']) ?></strong><br />	
							<strong>Quantity: </strong><?php if($p['quantity'] < 1) : echo "<span class='error'>Out of Stock</span>"; else : echo $p['quantity']; endif; ?>						
							
							<div class='product-button'>
								<a href='<?php echo site_url() . "store/addCartItem?pid=" . $p['id']; ?>'><button class='btn btn-primary'>Add to Cart</button></a>
							</div>
						</td>

					</tr>
					
					
				<?php endforeach; ?>
				<tr>
					<td>
						<div class='pagination'><?php echo $this->data['pagination']; ?></div>
						
					</td>
				</tr>
				</table>
 			</article>
			
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="span3 sidebar">
		
 			<div class='title'><a href='<?php echo site_url() . 'store/viewCart'; ?>'>Shopping Cart</a></div>
			
            <?php $this->load->view('sidebars/store-sidebar'); ?>
 		</div>