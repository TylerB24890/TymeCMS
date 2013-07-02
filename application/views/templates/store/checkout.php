
		<!-- Main content -->
 		<div class="span12">
 			<article>
				<?php if(!empty($this->data['cart'])) : ?>
					<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

						<tr>
							<th style='text-align: left;'>Item</th>
							<th style='text-align: left;'>Photo</th>
							<th style='text-align: left;'>QTY</th>
							<th style="text-align:right">Item Price</th>
							<th style="text-align:right">Sub-Total</th>
						</tr>
						
						<?php $i = 1; ?>

						<?php foreach ($this->data['cart'] as $items): ?>

							<tr>
								<td>
										

									<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
				

											<strong>Name: <a href='<?php echo site_url() . "store/viewProduct?pid=" . $items['id']; ?>'> <?php echo $items['name']; ?></a></strong><br />
											
											<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
												
												<?php if($option_name == 'sku') : echo "<strong>SKU:</strong> " . $option_value; ?>
								</td>
								<td>
												<?php elseif($option_name == 'photo') : echo "<img class='product-photo' src='" . site_url() . "uploads/" . $option_value . "'>"; endif; ?>

											<?php endforeach; ?>


									<?php endif; ?>

								</td>
								<td style="text-align:left"><?php echo $items['qty']; ?></td>
								<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
								<td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
							</tr>

							<?php $i++; ?>

						<?php endforeach; ?>

						<tr>
							<td colspan="2"> </td>
							<td class="right"><strong>Total</strong></td>
							<td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
						</tr>

					</table>

				<p>
					<?php echo "<a href='" . site_url() . "store/processCheckout'><button class='btn btn-success'>Pay Now</button></a>"; ?>
					<?php echo "<a href='" . site_url() . "store/viewCart'><button class='btn btn-warning'>Edit Cart</button></a>"; ?>
					<?php echo "<a href='" . site_url() . "store/clearCart'><button class='btn btn-danger'>Clear Cart</button></a>"; ?>
				</p>
			<?php else : ?>
				<div class='error'>There are no products in your cart.</div>
				<a href='<?php echo site_url() . 'store'; ?>'><button class='btn btn-success'>Continue Shopping</button></a>
				
			<?php endif; ?>
 			</article>
			 
 		</div>