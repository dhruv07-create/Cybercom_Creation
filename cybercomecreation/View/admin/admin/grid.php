<?php

  $obj=\Mage::getModel('Model\\Admin');

  $status=$obj->getStatusOption();

  $data=$this->getAdminData();
  
 ?>

<html>
  
<body>
   
  <content>
  
   <div style="margin-top: 10px;">

       <h5 style="float: left;" >Admin</h5><br>
       <hr>
       <a  href="<?php echo $this->getUrl('form'); ?>"  style="float: right;" ><button style="border:0px"class='btn btn-primary' >AddUser</button></a><br><br>

   <table  border="1" cellspacing="0" class='table table-striped'>

      <thead class='thead-dark ' >
      
     <th align="center" >UserId</th>
     <th align="center" >Name</th>
     <th align="center">Password</th>
     <th align="center">Status</th>
     <th align="center">CreateDate</th>
     <th align="center">Change</th>
    
    </thead>
    
    <?php

    
      foreach ($data->getData() as $value) { ?>
        
    <tr>

      <td><?php echo $value->userId;?></td>
      <td><?php echo $value->name;?></td>
      <td><?php echo $value->password;?></td>
      <td><?php echo $status[$value->status];?></td>
      <td><?php echo $value->createddate;?></td>
      <td>
         
        <a href="<?php echo $this->getUrl('edit',null,['id'=>$value->userId]); ?>"><button class="btn btn-primary" >Edit</button></a> 
        <a href="<?php echo $this->getUrl('delete',null,['id'=>$value->userId]); ?>"><button class="btn btn-danger" >Delete.</button></a> 

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