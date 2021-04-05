<?php  

$paymentMethods = $this->getPaymentMethods();
$cart = $this->getCart();


?>

<br><table class='table table-striped '>
  <tr>	
	<th colspan="2" class="bg-dark text-white ">PaymentMethod</th>
  </tr>
  <?php if($paymentMethods){ foreach ($paymentMethods->getData() as $key => $paymentMethod) : ?>
    <tr>
    	<td>
    		<input type="radio" value="<?php echo $paymentMethod->methodId; ?>" <?php if($cart->paymentMethodId==$paymentMethod->methodId){echo "checked" ;} ?> name="cart[paymentMethod]">
    	</td>
        <td>
        <?php echo $paymentMethod->name; ?>
      </td>
    </tr>	
  <?php endforeach; } ?>
  <tr>
    <td colspan="2">
      <input type="button" name="select" value="Select" onclick="submitForm1(this)" class="btn btn-info" >
    </td>
  </tr>
  
</table>


<script type="text/javascript">
  
 function submitForm1(button) {
      
      var form = $(button).closest('form');
      form.attr('action',"<?php  echo $this->getUrl('updatePaymentMethod');?>");
      form.submit();
 }

</script>
