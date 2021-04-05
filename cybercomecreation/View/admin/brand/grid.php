<?php
   
   $collection=$this->getCollection();
  
?>

<head>
<body>

<content>
 	
   <div style="margin-top: 10px;">

      <h5 style="float: left;" >Brand</h5><br>
      <hr>
    <a  href="<?php echo $this->getUrl('form'); ?>" style="float: right;" ><button style="border:0px" class='btn btn-primary'>AddBrand</button></a><br><br>

   <table  border="1" cellspacing="0" class='table table-striped'>

  <thead class='thead-dark' >
      <tr>
   	  
     <th align="center" >BrandId</th>
     <th align="center">Name</th>
     <th align="center">CreatedDate</th>
     <th align="center">Image</th>
     <th align="center">Change</th>
    
    </tr>
  </thead>  
     <?php

      foreach ($collection->getData() as $value) {


    ?>
      
    <tr>

      <td><?php echo $value->brandId;?></td>
      <td><?php echo $value->name;?></td>
      <td><?php echo $value->createddate;?></td>
      <td><img src="<?php echo $value->image;?>"></td>
      <td>
      	 
      	<a href="<?php echo $this->getUrl('edit',null,['id'=>$value->brandId]); ?>"><button class="btn btn-primary" >Edit.</button></a> 
      	<a href="<?php echo $this->getUrl('delete',null,['id'=>$value->brandId]); ?>"><button class="btn btn-danger" >Delete.</button></a> 

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