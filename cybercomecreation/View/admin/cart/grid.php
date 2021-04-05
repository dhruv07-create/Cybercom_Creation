<?php

$data=$this->getItems();

?>

<h5 style="float: left">Cart</h5><br>
<hr>

<a href="<?php echo $this->getUrl('grid','admin\product',null,true);?>" class="btn btn-primary" style='float: right;'>BackToItam</a><br>

<div> 
  	<input type="button" class="btn btn-info" onclick="submitForm(this)"  name="update" value="Update" >
	<table class='table table-striped'>
		<thead class=" text-white bg-dark ">
			<tr>
				<th>cartId</th>
				<th>ProductId</th>
				<th>Quentity</th>
				<th>Price</th>
				<th>RowTotal</th>
				<th>Discount</th>																		
				<th>Total-Final</th>
				<th>Action</th>
			</tr>
		</thead>
      <?php if($data){ foreach ($data->getData() as $key => $item) {
             $product=$item->getProduct();
       ?>
      	      <tr>
				<td><?php echo $item->cartId ;?></td>
				<td><?php echo $item->productId ;?></td>
				<td><input type="number" min="1" value="<?php echo $item->quentity ;?>" name="cart[quentity][<?php echo $item->cartItemId; ?>]"></td>
				<td><?php echo "$".$item->basePrice ;?></td>
				<td><?php echo "$".$item->price ?></td>	
				<td><?php echo  "$".$item->discount; ?></td>	
				<td><?php echo "$".(($item->price)-$item->discount); ?></td>
				<td>
               <a href="<?php echo $this->getUrl('delete',null,['id'=>$item->cartItemId],true) ;?>" class='btn btn-danger' >Delete</a>
				</td>
             </tr>
       <?php } } ?>

	</table>
 </div>

<script type="text/javascript">
	 
 function submitForm(button) {
 	var form=$(button).closest('form');
 	form.attr('action','<?php echo $this->getUrl('updateQuentity',null,null,true); ?>');
 	form.submit();

 }

</script>