<ul class='products'>

<?php if(!empty($this->data['cart'])): ?>

<?php foreach($this->data['cart'] as $p): ?>

	<li><a href='<?php echo site_url() . "store/viewProduct?pid=" . $p['id']; ?>'> <?php echo $p['name']; ?></a> x<?php echo $p['qty']; ?> = $<?php echo $this->cart->format_number($p['price']); ?></li>
	
<?php endforeach; ?>

<li><b>Sub-total: </b> $<?php echo $this->cart->format_number($this->data['subtotal']); ?></li>

<li>
	<div class='product-button'>
		<a href='<?php echo site_url() . 'store/checkout'; ?>'><button class='btn btn-success'>Checkout</button></a>
	</div>
</li>

<?php else: ?>

<li><b>Your cart is empty</b></li>

<?php endif; ?>


</ul>