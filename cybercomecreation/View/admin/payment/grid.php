
<?php

  $obj=\Mage::getModel("Model\\Payment");

  $status=$obj->getStatusOption();

  $collection=$this->getPayments();
  
 ?>

<html>
  
<body>
   
  <content>
  
   <div style="margin-top: 10px;">

       <h5 style="float: left;" >Payment</h5><br>
       <hr>
       <a  href="<?php echo $this->getUrl('form'); ?>" style="float: right;" ><button style="border:0px" class='btn btn-primary'>AddPayment</button></a><br><br>

   <table  border="1" cellspacing="0" class='table table-striped'>

  <thead class="thead-dark">

      <tr>
      
     <th align="center" >methodId</th>
     <th align="center" >Name</th>
     <th align="center">Code</th>
     <th align="center">Description</th>
     <th align="center">Status</th>
     <th align="center">CreateDate</th>
     <th align="center">Change</th>
    
    </tr>

   </thead> 
    
    <?php

    
      foreach ($collection->getData() as $value) {
    ?>
    
    <tr>

      <td><?php echo $value->methodId;?></td>
      <td><?php echo $value->name;?></td>
      <td><?php echo $value->code;?></td>
      <td><?php echo $value->description;?></td>
      <td><?php echo $status[$value->status];?></td>
      <td><?php echo $value->createddate;?></td>
      <td>
         
        <a href="<?php echo $this->getUrl('edit',null,['id'=>$value->methodId]); ?>"><button class="btn btn-primary" >Edit</button></a> 
        <a href="<?php echo $this->getUrl('delete',null,['id'=>$value->methodId]); ?>"><button class="btn btn-danger" >Delete.</button></a> 

      </td>

    
    </tr>

    <?php
 
     }
  
    ?>

   </table>

     </div> 

 </div> 

 </content>

</body>

</html>