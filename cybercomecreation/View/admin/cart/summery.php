<?php   
$cart = $this->getCart();
$items=$cart->getItems();
$total=0;
?>
<table border="1" class="table table-striped" >
	<tr>
		<th class="bg-dark text-white" colspan="3" >Order Summery</th>
	</tr>
	<tr>
		<th>ProductId</th>
		<th>Quentity</th>
		<th>Total</th>
	</tr>

  <?php if($items){foreach ($items->getData() as $key => $item):?> 
	<tr>
		<td><?php echo $item->productId; ?></td>
		<td><?php echo $item->quentity; ?></td>
		<td><?php echo '$'.(($item->price)-$item->discount);  $total+=$item->price-$item->discount;  ?></td>
	</tr>
  <?php endforeach; ?>	

	<tr>
		<td colspan="2">Subtotal</td>
		<td><?php echo "$".$total; ?></td>
	</tr>
    <tr>
		<td colspan="2">ShippingCharge</td>
		<td><?php if($cart->getShippingMethod()){echo "$".$cart->getShippingMethod()->amount;}else{echo "$0";}; ?></td>
	</tr>
	<tr>
		<th colspan="2">Total</th>
		<th><?php  if($cart->getShippingMethod()){$total += ($cart->getShippingMethod()->amount); echo "$".$total;}else{ echo "$0";};  ?></th>
	</tr>
	<?php } ?>
</table>
