<?php

$pairs=$this->getCustomer();
$session=\Mage::getModel("Model\\Admin\\Session");

?>
<b>Customer:</b>
<br>
<select name="cart[customer]" id="select" class="form form-control" onchange="submitFor()" >
	<option value="0" >SELECT</option>
 <?php foreach($pairs as $customerId => $name): ?>	
	<option value="<?php echo $customerId ;?>" <?php if($customerId==$session->customerId){ echo 'selected'; } ?> ><?php echo $name ;?></option>
 <?php endforeach; ?>	
</select>


<script type="text/javascript">
	
function submitFor() 
{ 
  var form = $('#select').closest('form');
  form.submit();
}	
   
</script>