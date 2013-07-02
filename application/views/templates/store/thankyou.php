
		<!-- Main content -->
 		<div class="span9">
 			<article>
				
				<div class='success'>
					Thank you for your purchase!
				</div>
				
				<a href='<?php echo site_url() . 'store'; ?>'><button class='btn btn-primary'>Continue Shopping</button></a>
 			</article>
			
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="span3 sidebar">
		
 			<div class='title'><a href='<?php echo site_url() . '/store/viewCart'; ?>'>Shopping Cart</a></div>
			
            <?php $this->load->view('sidebars/store-sidebar'); ?>
 		</div>