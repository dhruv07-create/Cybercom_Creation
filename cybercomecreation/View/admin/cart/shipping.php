<?php
$cart = $this->getCart();
$shippingMethods = $this->getShippingMethods();

?>

<br><table class='table table-striped ' >
  <tr>	
	<th colspan="2" class="bg-dark text-white ">ShippingMethod</th>
  </tr>
  <?php if($shippingMethods){ foreach ($shippingMethods->getData() as $key => $method) :?>
  <tr>
      <td>
        <input type="radio" value="<?php echo $method->methodId; ?>" <?php  if($cart->shippingMethodId==$method->methodId){echo "checked" ;}?> name="cart[shippingMethod]">
      </td>
        <td>
        <?php echo $method->name; ?>
      </td>
    </tr> 
   <?php endforeach; } ?> 
   <tr>
    <td colspan="2">
      <input type="button" name="select" value="Select" onclick="submitForm2(this)" class="btn btn-info" >
    </td>
  </tr>
</table>

<script type="text/javascript">
  
 function submitForm2(button) {
      
      var form = $(button).closest('form');
      form.attr('action',"<?php  echo $this->getUrl('updateShippingMethod');?>");
      form.submit();
 }

</script>
