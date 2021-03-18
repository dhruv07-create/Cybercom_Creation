<?php

 $shipping=$this->getShipping();
 $billing=$this->getBilling();

?>


<div align="center" >
	
   	  

   <table border="1" cellspacing="0" class="table">

  	 <tr>
  	 	<td class="bg-dark text-white" >Shipping Address</td>
  	 </tr>

  	 <tr>
  	 	   
  	 	   <td> 
  	 	   	   	   Address:
  	 	   	   	  <input type="text" name="shipping[address]" value="<?php echo $shipping->address ; ?>" class="form-control col-lg-8">
  	 	   	   	   City:
  	 	   	   	  <input type="text" name="shipping[city]" value="<?php echo $shipping->city ; ?>" class="form-control col-lg-8">
  	 	   	   	   State:
  	 	   	   	  <input type="text" name="shipping[state]" value="<?php echo $shipping->state ; ?>" class="form-control col-lg-8">
  	 	   	   	   Zip-Code:
  	 	   	   	  <input type="text" name="shipping[zipcode]" value="<?php echo $shipping->zipcode ; ?>" class="form-control col-lg-8">
  	 	   	   	   Country
  	 	   	   	  <input type="text" name="shipping[country]" value="<?php echo $shipping->country ; ?>" class="form-control col-lg-8"> 
  	 	   	  
  	 	   </td>

  	 </tr>
  	
  </table>

   <table border="1" cellspacing="0" class="table form-group">
      <tr>
  	 	<td class="bg-dark text-white" >Billing Address</td>
  	 </tr> 
  	 <tr>
  	      <td>	
    	   Address:
		   	  <input type="text" name="billing[address]" value="<?php echo $billing->address ; ?>" class="form-control col-lg-8" >
		   	   City:
		   	  <input type="text" name="billing[city]" value="<?php echo $billing->city ; ?>" class="form-control col-lg-8">
		   	   State:
		   	  <input type="text" name="billing[state]" value="<?php echo $billing->state ; ?>" class="form-control col-lg-8">
		   	   Zip-Code:
		   	  <input type="text" name="billing[zipcode]" value="<?php echo $billing->zipcode ; ?>" class="form-control col-lg-8">
		   	   Country
		   	  <input type="text" name="billing[country]" value="<?php echo $billing->country ; ?>" class="form-control col-lg-8"> 
		   	</td>
		   </tr>	
   </table>
             

             <a href="<?php echo $this->getUrl('grid'); ?>" class='btn btn-danger'>Cancle</a>
             <input type="submit" name="add_sub" value="submit" class='btn btn-success'>


</div>
</form>