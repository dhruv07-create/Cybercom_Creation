<?php

  $collection=$this->getCustomers();
  
  $obj=new \Model\Customer();

  $status=$obj->getStatusOption();

?>

<!DOCTYPE html>
<html>

<body>

<content>

   <div style="margin-top: 0px;">
     <h5 style="float: left;" >Customer</h5><br>
     <hr>
     <a href="<?php echo $this->getUrl('form',null,['t'=>'a']); ?>" style="float: right;" ><button style="border:0px" class="btn btn-primary" >AddCustomer</button></a><br><br>
   <table  border="1" cellspacing="0" class='table table-striped' >

      <thead class='thead-dark'>

         <tr>
   	  
     <th align="center">CustomerId</th>
     <th align="center">FirstName</th>
     <th align="center">LastsName</th>
     <th align="center">Email</th>
     <th align="center">Password</th>
     <th align="center">Customergroup</th>
     <th align="center">BillingAddress</th>
     <th align="center">Status</th>
     <th align="center">CreateDate</th>
     <th align="center">UpdateDate</th>
     <th align="center">Change</th>

      </tr>    
    </thead>
    
    <?php

    
      foreach ($collection->getData() as $key=> $value) {
    ?>
        
    <tr>

      <td><?php echo $value->customerId;?></td>
      <td><?php echo $value->firstname;?></td>
      <td><?php echo $value->lastname;?></td>
      <td><?php echo $value->email;?></td>
      <td><?php echo $value->password;?></td>
      <td><?php echo $value->groupname ?></td>
      <td><?php echo $value->address ?></td>
      <td><?php echo $status[$value->status];?></td>
      <td><?php echo $value->createddate;?></td>
      <td><?php echo $value->updateddate;?></td>
      <td>
      	 
      	<a href="<?php echo $this->getUrl('edit',null,['id'=>$value->customerId,'t'=>'u']); ?>"><button class="btn btn-primary" >Edit</button></a> 
      	<a href="<?php echo $this->getUrl('delete',null,['id'=>$value->customerId]); ?>"><button class="btn btn-danger" >Delete.</button></a> 

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