<?php  

$shipping = $this->getShippingAddress();
$billing = $this->getBillingAddress();

?>

<div>
	<div style="display: inline-block;" >
<br><table class='table table-striped ' >
  <tr>	
	<th colspan="2" class="bg-dark text-white ">ShippingAddress</th>
  </tr>
  <tr>
  	<td>
  		&nbsp;
  	</td>
  </tr> 
  <tr>
  	<td>
  		FirstName:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $shipping->firstname ; ?>" name="cart[shipping][firstname]">
  	</td>
  </tr>	
  <tr>
  	<td>
  		city:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $shipping->city ; ?>" name="cart[shipping][city]">
  	</td>
  </tr>	
  <tr>
  	<td>
  		State:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $shipping->state ; ?>" name="cart[shipping][state]">
  	</td>
  </tr>
   <tr>
  	<td>
  		Country:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $shipping->country ; ?>" name="cart[shipping][country]">
  	</td>
  </tr>
  <tr>
  	<td>
  		Address:
  	</td>
  	<td>
  		<textarea  name="cart[shipping][address]"><?php echo $shipping->address ; ?></textarea>
  	</td>
  </tr>		
  <tr>
  	<td>
  		ZipCode:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $shipping->zipcode ; ?>" name="cart[shipping][zipcode]">
  	</td>
  </tr>
  <tr>
  	<td >
  		<input type="button" class='btn btn-info' onclick='shippingDone(this)' name="shipping" value="Save" >
  	</td>
  	<td >
  		<input type="checkbox" class='form from-control' name="cart[addressbook1]" value="yes" > Save to address book
  	</td>
  </tr>	
</table>
 </div>

<div style="display: inline-block;" >
<br><table class='table table-striped ' >
  <tr>	
	<th colspan="2" class="bg-dark text-white ">BillingAddress</th>
  </tr>
   <tr>
  	<td>
  		<input type="checkbox" value="1" <?php if($billing->sameasshipping==1){echo 'checked'; } ?>  name="cart[billing][sameasshipping]">
  	</td>
  	<td>
  		Same as shipping
  	</td>
  </tr>	 
  <tr>
  	<td>
  		FirstName:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $billing->firstname ; ?>" name="cart[billing][firstname]">
  	</td>
  </tr>	
  <tr>
  	<td>
  		city:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $billing->city ; ?>" name="cart[billing][city]">
  	</td>
  </tr>	
  <tr>
  	<td>
  		State:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $billing->state ; ?>" name="cart[billing][state]">
  	</td>
  </tr>
   <tr>
  	<td>
  		Country:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $billing->country ; ?>" name="cart[billing][country]">
  	</td>
  </tr>	
  <tr>
  	<td>
  		Address:
  	</td>
  	<td>
  		<textarea  name="cart[billing][address]"><?php echo $billing->address ; ?></textarea>
  	</td>
  </tr>			
  <tr>
  	<td>
  		ZipCode:
  	</td>
  	<td>
  		<input type="text" value="<?php echo $billing->zipcode ; ?>" name="cart[billing][zipcode]">
  	</td>
  </tr>	
   <tr>
  	<td>
  		<input type="button" class='btn btn-info' onclick='billingDone(this)' name="billing" value="Save" >
  	</td>
  	<td>
  		<input type="checkbox" class='form from-control' name="cart[addressbook2]" value="yes" > Save to address book
  	</td>
  </tr>	
</table>
</div>
</div>


<script type="text/javascript">
	
	function shippingDone(button) 
	{
       var form = $(button).closest('form');
       form.attr('action','<?php echo $this->getUrl('updateShippingAddress'); ?>');
       form.submit();
	}

	function billingDone(button) 
	{
       var form = $(button).closest('form');
       form.attr('action','<?php echo $this->getUrl('updateBillingAddress'); ?>');
       form.submit();
	}

</script>