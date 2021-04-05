<form action="<?php echo $this->getUrl('updateDetails','admin\cart',null,true); ?>" method='POST' >
	
   <table>
   	  <tr>
   	  	 <td>
   	  	 	<?php echo \Mage::getBlock('Block\admin\Cart\Customer')->setCart($this->getCart())->toHtml(); ?><br>
   	  	 </td>
   	  </tr>
   	  <tr>
   	  	 <td>
   	  	 	<?php echo \Mage::getBlock('Block\admin\Cart\Address')->setCart($this->getCart())->toHtml(); ?><br>
   	  	 </td>
   	  </tr>
   	   <tr>
	   	  	 <td>
	   	  	 	<?php echo \Mage::getBlock('Block\admin\Cart\Payment')->setCart($this->getCart())->toHtml(); ?><br>
	   	  	 </td>
   	  </tr>
   	  <tr>
   	  	    <td>
   	    	 	<?php echo \Mage::getBlock('Block\admin\Cart\Shipping')->setCart($this->getCart())->toHtml(); ?><br>
   	  	   </td>
   	  </tr>
   	  <tr>	 
   	  	 <td>
   	  	 	<?php echo \Mage::getBlock('Block\admin\Cart\Grid')->setCart($this->getCart())->toHtml(); ?><br>
   	  	 </td>
   	  </tr>
   	   <tr>	 
   	  	 <td>
   	  	 	<?php echo \Mage::getBlock('Block\admin\Cart\Summery')->setCart($this->getCart())->toHtml(); ?>
   	  	 </td>
   	  </tr>
   </table>

</form>