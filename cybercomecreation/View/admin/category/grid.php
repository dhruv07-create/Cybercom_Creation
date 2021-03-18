<?php

   $data=$this->getCategorys();
   $ob=\Mage::getModel('Model\Category');
   $status=$ob->getStatusOption();
     
?>



  <content>

   <div style="margin-top: 10px;">
    
    <h5 style="float: left;" >Category</h5><br>
    <hr><br>
    <a  href="<?php echo $this->getUrl('form'); ?>" style="float: right;" ><button style="border:0px" class="btn btn-primary">AddCategory</button></a><br><br>
    
   <table  border="1" cellspacing="0" class='table table-striped' >
   	
    <thead class='thead-dark' >  
        <tr>

     <th>Id</th>
     <th>Name</th>
     <th>Featured</th>
     <th>Status</th>
     <th>Description</th> 
     <th>pathId</th>
     <th>CreatedDate</th>
     <th>Change</th> 
       </tr>
   
   </thead>
    
    <?php

      foreach ($data->getData() as $key=>$value) {
    ?>
    
    <tr>

      <td><?php echo $value->categoryId;?></td>
      <td><?php echo $this->getName($value);?></td>
      <td><?php echo $value->featured; ?></td>
      <td><?php echo $status[$value->status];?></td>
      <td><?php echo $value->description;?></td>
      <td><?php echo $value->pathId;?></td>
      <td><?php echo $value->createddate;?></td>
      <td>
      	 
      	<a href="<?php echo $this->getUrl('edit',null,['id'=>$value->categoryId]); ?>"><button class="btn btn-primary" >Edit</button></a> 
      	<a href="<?php  echo $this->getUrl('delete',null,['id'=>$value->categoryId]);  ?>"><button class="btn btn-danger" >Delete.</button></a> 

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