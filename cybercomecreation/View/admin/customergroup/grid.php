<?php
   
   $collection=$this->getCatogoryGroups();
  
?>


<head>
<body>

<content>
 	
   <div style="margin-top: 10px;">

      <h5 style="float: left;" >CustomerGroup</h5><br>
      <hr>
    <a  href="<?php echo $this->getUrl('form'); ?>" style="float: right;" ><button style="border:0px" class='btn btn-primary'>AddGroup</button></a><br><br>

   <table  border="1" cellspacing="0" class='table table-striped'>

  <thead class='thead-dark' >
      <tr>
   	  
     <th align="center" >GroupId</th>
     <th align="center">Name</th>
     <th align="center">CreatedDate</th>
     <th align="center">Change</th>
    
    </tr>
  </thead>  
     <?php

      foreach ($collection->getData() as $value) {


    ?>
      
    <tr>

      <td><?php echo $value->groupId;?></td>
      <td><?php echo $value->name;?></td>
      <td><?php echo $value->createddate;?></td>
      <td>
      	 
      	<a href="<?php echo $this->getUrl('edit',null,['id'=>$value->groupId]); ?>"><button class="btn btn-primary" >Edit</button></a> 
      	<a href="<?php echo $this->getUrl('delete',null,['id'=>$value->groupId]); ?>"><button class="btn btn-danger" >Delete.</button></a> 

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