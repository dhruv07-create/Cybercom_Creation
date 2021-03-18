<?php
   
   $collection=$this->getProducts();

   $obj=\Mage::getModel('Model\\Product');

   $arra=$obj->getStatusOption();
  
?>


<head>
<body>

<content>
 	
   <div style="margin-top: 10px;">

      <h5 style="float: left;" >Product</h5><br>
      <hr>
    <a  href="<?php echo $this->getUrl('form',null,['m'=>'a']); ?>" style="float: right;" ><button style="border:0px" class='btn btn-primary'>AddProduct</button></a><br><br>

   <table  border="1" cellspacing="0" class='table table-striped'>

  <thead class='thead-dark' >
      <tr>
   	  
     <th align="center" >ProductId</th>
     <th align="center" >sku</th>
     <th align="center">Name</th>
     <th align="center">Price</th>
     <th align="center">Discount</th>
     <th align="center">Quantity</th>
     <th align="center">Description</th>
     <th align="center">Status</th>
     <th align="center">CreatedDate</th>
     <th align="center">UpdatedDate</th>
     <th align="center">Change</th>
    
    </tr>
  </thead>  
     <?php

      foreach ($collection->getData() as $value) {


    ?>
      
    <tr>

      <td><?php echo $value->productId;?></td>
      <td><?php echo $value->sku;?></td>
      <td><?php echo $value->name;?></td>
      <td><?php echo $value->price;?></td>
      <td><?php echo $value->discount;?></td>
      <td><?php echo $value->quantity;?></td>
      <td><?php echo $value->description;?></td>
      <td><?php echo $arra[$value->status];?></td>
      <td><?php echo $value->createddate;?></td>
      <td><?php echo $value->updateddate;?></td>
      <td>
      	 
      	<a href="<?php echo $this->getUrl('edit',null,['id'=>$value->productId,'m'=>'e']); ?>"><button class="btn btn-primary" >Edit</button></a> 
      	<a href="<?php echo $this->getUrl('delete',null,['id'=>$value->productId]); ?>"><button class="btn btn-danger" >Delete.</button></a> 

      </td>

    
    </tr>

     <?php
 
     }
  
    ?>
 
    </table>

     </div> 

 </content>

</body>
</html>